<?php

namespace App\Console\Commands;

use App\Occurrence;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RetrieveMainOccurrences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vost:retrieve-main-occurrences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve Main Occurrences from ProCiv website';

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
        //
        $this->info('Starting to Retrieve Occurrences: '.Carbon::now()->format('Y-m-d H:i:s'));
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

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            echo curl_error($curl)."\n";
            die();
        }
        $result = json_decode($result);

        $result = $result->GetMainOccurrencesResult->arrayInfo[0]->Data;

        $result = collect($result);

        $this->info("Encontrei {$result->count()} ocorrências principais.");

        foreach ($result as $item) {
            $occurrence = Occurrence::where('prociv_id', $item->Numero);

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
                'api_response'                            => $item->toJson(),
            ]);
        }
    }
}
