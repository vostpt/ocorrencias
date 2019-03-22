<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    //
    protected $table = 'counties';

    protected $fillable
        = [
            'dico',
            'district_id',
            'name',
        ];


    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }
}
