<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'districts';

    protected $fillable
        = [
            'name',
            'dico',
        ];

    public function counties()
    {
        return $this->hasMany(County::class);
    }

    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }
}
