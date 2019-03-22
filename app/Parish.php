<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    //

    protected $table = 'parishes';

    protected $fillable
        = [
            'dico',
            'district_id',
            'county_id',
            'name',
        ];


    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
