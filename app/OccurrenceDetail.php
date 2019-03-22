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
        ];

    public function occurrence()
    {
        $this->belongsTo(Occurrence::class);
    }
}
