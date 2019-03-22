<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    protected $table = 'occurrences';

    protected $fillable
        = [
            'prociv_id',
            'lat',
            'lon',
            'district_id',
            'county_id',
            'parish_id',
            'locality',
            'nature',
            'nature_id',
            'nature_fullname',
            'local',
            'started_at',
            'type_id',
        ];

    protected $with
        = [
            'details',
        ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class);
    }

    public function type()
    {
        return $this->belongsTo(OccurrenceType::class, 'type_id');
    }

    public function details()
    {
        return $this->hasMany(OccurrenceDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(OccurrenceComment::class);
    }

    public static function active()
    {
        $sql
            = \DB::select(\DB::raw('select od.*, o.*, d.name district, c.name county, p.name parish, od.created_at last_update, ot.name nature from occurrences o 
                                join occurrence_details od on od.id = (SELECT id from occurrence_details where occurrence_details.occurrence_id = o.id order by created_at desc limit 1)
                                inner join districts d on d.id = o.district_id
                                inner join counties c on c.id = o.county_id
                                inner join parishes p on p.id = o.parish_id
                                left join occurrence_types ot on ot.id = o.type_id
                                where od.state_id IN (5) AND ot.code NOT BETWEEN 4101 AND 4123 AND ot.code NOT BETWEEN 4311 AND 4315
                                ORDER BY started_at DESC'));

        return $sql;
    }

    public static function activeCounter()
    {
        $sql = \DB::select(\DB::raw('select count(*) counter from occurrences o 
                                  join occurrence_details od on od.id = (SELECT id from occurrence_details where occurrence_details.occurrence_id = o.id order by created_at desc limit 1)
                                  where od.state_id = 5'));

        return $sql[0]->counter;
    }

    public function getLastDetailAttribute()
    {
        return $this->details->sortByDesc('date')->first();
    }
}
