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

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://www.prociv.pt/_vti_bin/ARM.ANPC.UI/ANPC_SituacaoOperacional.svc/GetHistoryOccurrencesByLocation');
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            '{"distritoID":null,"concelhoID":null,"freguesiaID":null,"pageSize":99999,"pageIndex":0,"forToday":false,"natureza":"0"}');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json;charset=UTF-8',
            'Accept: application/json, text/plain, */*',
            'Connection: keep-alive',
        ]);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            echo curl_error($curl);
            die();
        }
        $result = json_decode($result);

        $result = $result->GetHistoryOccurrencesByLocationResult->ArrayInfo[0]->Data;

        $result = collect($result);

        $this->info("Encontrei {$result->count()} resultados");

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
    }
}
