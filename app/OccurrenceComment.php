<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrenceComment extends Model
{
    //

    protected $fillable
        = [
            'text',
            'user_id',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function occurrence()
    {
        return $this->belongsTo(Occurrence::class);
    }
}
