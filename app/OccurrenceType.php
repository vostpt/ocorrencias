<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrenceType extends Model
{
    //
    protected $table = 'occurrence_types';

    protected $fillable
        = [
            'code',
            'name',
            'abreviatura',
            'especieAbreviatura',
            'familiaAbreviatura',
        ];


    public function occurrences()
    {
        return $this->hasMany(Occurrence::class, 'type_id');
    }
}
