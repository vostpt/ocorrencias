<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Occurrence;
use Illuminate\Http\Request;

class OccurrencesController extends Controller
{

    public function getOccurrenceByNumber(string $number)
    {
        $occurrence = Occurrence::where('prociv_id', $number)->first();

        if (is_null($occurrence)) {
            return [];
        }

        return $occurrence;
    }
}