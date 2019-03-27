<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrenceDetail extends Model
{
    //

    protected $fillable
        = [
            'prociv_id',
            'NumeroMeiosAereosEnvolvidos',
            'NumeroMeiosTerrestresEnvolvidos',
            'NumeroOperacionaisAereosEnvolvidos',
            'NumeroOperacionaisTerrestresEnvolvidos',
            'state',
            'state_id',
            'important',
            'cos',
            'entidadesNoTO',
            'notas',
            'GruposReforcoEnvolvidos',
            'NumAvioesMediosEnvolvidos',
            'NumAvioesOutrosEnvolvidos',
            'NumAvioesPesadosEnvolvidos',
            'NumBombeirosEnvolvidos',
            'NumBombeirosOperEnvolvidos',
            'NumEsfEnvolvidos',
            'NumEsfOperEnvolvidos',
            'NumFAAEnvolvidos',
            'NumFAAOperEnvolvidos',
            'NumFebEnvolvidos',
            'NumFebOperEnvolvidos',
            'NumGNRGipsEnvolvidos',
            'NumGNRGipsOperEnvolvidos',
            'NumGNROutrosEnvolvidos',
            'NumGNROutrosOperEnvolvidos',
            'NumPSPEnvolvidos',
            'NumPSPOperEnvolvidos',
            'NumHelicopterosLigeirosMediosEnvolvidos',
            'NumHelicopterosOutrosEnvolvidos',
            'NumHelicopterosPesadosEnvolvidos',
            'OutrosOperacionaisEnvolvidos',
            'POSITDescricao',
            'PCO',
            'PontoSituacao',
            'PPIAtivados',
            'api_response',
        ];

    public function occurrence()
    {
        $this->belongsTo(Occurrence::class);
    }
}
