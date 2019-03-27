<?php

namespace App\Console\Commands;

use App\County;
use App\District;
use App\Occurrence;
use App\OccurrenceDetail;
use App\OccurrenceType;
use App\Parish;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RetrieveOcurrences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vost:retrieve-ocurrences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve all ocurrences';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->info('Starting to Retrieve Occurrences: '.Carbon::now()->format('Y-m-d H:i:s'));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://www.prociv.pt/_vti_bin/ARM.ANPC.UI/ANPC_SituacaoOperacional.svc/GetHistoryOccurrencesByLocation');
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            '{"distritoID":null,"concelhoID":null,"freguesiaID":null,"pageSize":99999,"pageIndex":0,"allData":true,"natureza":"0"}');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json;charset=UTF-8',
            'Accept: application/json, text/plain, */*',
            'Connection: keep-alive',
        ]);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            echo curl_error($curl)."\n";
            die();
        }
        $result = json_decode($result);

        $result = $result->GetHistoryOccurrencesByLocationResult->ArrayInfo[0]->Data;

        $result = collect($result);

        curl_close($curl);

        // Get main occurrences
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://www.prociv.pt/_vti_bin/ARM.ANPC.UI/ANPC_SituacaoOperacional.svc/GetMainOccurrences');
        curl_setopt($curl, CURLOPT_POSTFIELDS, "{\"allData\":true,\"pageIndex\":1}");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json;charset=UTF-8',
            'Accept: application/json, text/plain, */*',
            'Connection: keep-alive',
        ]);


        $main_result = curl_exec($curl);

        if (curl_errno($curl)) {
            echo curl_error($curl)."\n";
            die();
        }
        $main_result = json_decode($main_result);

        $main_result = $main_result->GetMainOccurrencesResult->arrayInfo[0]->Data;

        $main_result = collect($main_result);
        curl_close($curl);


        $this->info("Encontrei {$result->count()} resultados");

        \DB::beginTransaction();
        foreach ($result as $item) {
            $occurrence = Occurrence::where('prociv_id', $item->Numero)->first();


            if (is_null($occurrence)) {
                $this->info('Não encontrei match para '.$item->Numero);

                $started_at = $item->DataOcorrencia;
                preg_match("/\(([^\)]*)\+/", $started_at, $matches);
                $started_at = Carbon::createFromTimestamp($matches[1] / 1000)->toDateTimeString();

                $district = District::where('dico', str_pad($item->Distrito->DI, 6, 0, STR_PAD_RIGHT))->first();
                $county   = County::where('dico', str_pad($item->Concelho->DICO, 6, 0, STR_PAD_RIGHT))->first();
                $parish   = Parish::where('dico', $item->Freguesia->DICOFRE)->first();

                $type = OccurrenceType::where('code', $item->Natureza->Codigo)->first();

                $occurrence = Occurrence::create([
                    'prociv_id'   => $item->Numero,
                    'lat'         => $item->Latitude,
                    'lon'         => $item->Longitude,
                    'district_id' => $district->id,
                    'county_id'   => $county->id,
                    'parish_id'   => $parish->id,
                    'locality'    => $item->Localidade,
                    'started_at'  => $started_at,
                    'type_id'     => $type->id,
                ]);
            }

            // Create new Ocurrence Detail

            $occurrence->details()->create([
                'prociv_id'                              => $item->Numero,
                'NumeroMeiosAereosEnvolvidos'            => $item->NumeroMeiosAereosEnvolvidos,
                'NumeroMeiosTerrestresEnvolvidos'        => $item->NumeroMeiosTerrestresEnvolvidos,
                'NumeroOperacionaisAereosEnvolvidos'     => $item->NumeroOperacionaisAereosEnvolvidos,
                'NumeroOperacionaisTerrestresEnvolvidos' => $item->NumeroOperacionaisTerrestresEnvolvidos,
                'state'                                  => $item->EstadoOcorrencia->Name,
                'state_id'                               => $item->EstadoOcorrenciaID,
            ]);
        }

        $this->info("Encontrei {$main_result->count()} ocorrências principais.");

        foreach ($main_result as $item) {
            $this->info('Número: '.$item->Numero);
            $occurrence = Occurrence::where('prociv_id', $item->Numero)->first();

            $last_detail = $occurrence->last_detail;

            $last_detail->update([
                'important'                               => true,
                'cos'                                     => $item->COS,
                'entidadesNoTO'                           => $item->EntidadesNoTO,
                'notas'                                   => $item->Notas,
                'GruposReforcoEnvolvidos'                 => $item->GruposReforcoEnvolvidos,
                'NumAvioesMediosEnvolvidos'               => $item->NumAvioesMediosEnvolvidos,
                'NumAvioesOutrosEnvolvidos'               => $item->NumAvioesOutrosEnvolvidos,
                'NumAvioesPesadosEnvolvidos'              => $item->NumAvioesPesadosEnvolvidos,
                'NumBombeirosEnvolvidos'                  => $item->NumBombeirosEnvolvidos,
                'NumBombeirosOperEnvolvidos'              => $item->NumBombeirosOperEnvolvidos,
                'NumEsfEnvolvidos'                        => $item->NumEsfEnvolvidos,
                'NumEsfOperEnvolvidos'                    => $item->NumEsfOperEnvolvidos,
                'NumFAAEnvolvidos'                        => $item->NumFAAEnvolvidos,
                'NumFAAOperEnvolvidos'                    => $item->NumFAAOperEnvolvidos,
                'NumFebEnvolvidos'                        => $item->NumFebEnvolvidos,
                'NumFebOperEnvolvidos'                    => $item->NumFebOperEnvolvidos,
                'NumGNRGipsEnvolvidos'                    => $item->NumGNRGipsEnvolvidos,
                'NumGNRGipsOperEnvolvidos'                => $item->NumGNRGipsOperEnvolvidos,
                'NumGNROutrosEnvolvidos'                  => $item->NumGNROutrosEnvolvidos,
                'NumGNROutrosOperEnvolvidos'              => $item->NumGNROutrosOperEnvolvidos,
                'NumPSPEnvolvidos'                        => $item->NumPSPEnvolvidos,
                'NumPSPOperEnvolvidos'                    => $item->NumPSPOperEnvolvidos,
                'NumHelicopterosLigeirosMediosEnvolvidos' => $item->NumHelicopterosLigeirosMediosEnvolvidos,
                'NumHelicopterosOutrosEnvolvidos'         => $item->NumHelicopterosOutrosEnvolvidos,
                'NumHelicopterosPesadosEnvolvidos'        => $item->NumHelicopterosPesadosEnvolvidos,
                'OutrosOperacionaisEnvolvidos'            => $item->OutrosOperacionaisEnvolvidos,
                'POSITDescricao'                          => $item->POSITDescricao,
                'PCO'                                     => $item->PCO,
                'PontoSituacao'                           => $item->PontoSituacao,
                'PPIAtivados'                             => $item->PPIAtivados,
                'api_response'                            => json_encode((array)$item),
            ]);
            $last_detail->save();
        }

        \DB::commit();
        $this->info('Finished retrieve occurrences at: '.Carbon::now()->format('Y-m-d H:i:s'));

        return 1;
    }
}
