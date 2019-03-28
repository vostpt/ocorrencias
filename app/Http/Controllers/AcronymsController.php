<?php

namespace App\Http\Controllers;

use App\Acronym;
use Illuminate\Http\Request;

class AcronymsController extends Controller
{
    //
    public function getAcronymDescription(string $acronym)
    {

        $acronym = Acronym::where('acronym', 'LIKE', $acronym)->first();

        if (is_null($acronym)) {
            return [];
        }

        return $acronym;
    }
}
