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
        $active = self::whereIn('state_id', [5, 6, 7])->get();

        return $active;
        $sql
            = \DB::select(\DB::raw('select od.*, o.*, d.name district, c.name county, p.name parish, od.created_at last_update, ot.name nature from occurrences o 
                                join occurrence_details od on od.id = (SELECT id from occurrence_details where occurrence_details.occurrence_id = o.id order by created_at desc limit 1)
                                inner join districts d on d.id = o.district_id
                                inner join counties c on c.id = o.county_id
                                inner join parishes p on p.id = o.parish_id
                                left join occurrence_types ot on ot.id = o.type_id
                                where od.state_id IN (5,6,7) AND ot.code NOT BETWEEN 4101 AND 4123 AND ot.code NOT BETWEEN 4311 AND 4315
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

    public static function activeFires()
    {
        $sql = \DB::select(\DB::raw('select * from occurrences o 
                                  join occurrence_details od on od.id = (SELECT id from occurrence_details where occurrence_details.occurrence_id = o.id order by created_at desc limit 1)
                                  join occurrence_types ot on o.type_id = ot.id
                                  where od.state_id = 5 and ot.code BETWEEN 3101 AND 3111'));

        return collect($sql);
    }

    public function getLastDetailAttribute()
    {
        return $this->details->sortByDesc('created_at')->first();
    }
}
