<?php

namespace App\Http\Controllers;

use App\Acronym;
use Illuminate\Http\Request;

class AcronymsController extends Controller
{
    //
    public function getAcronymDescription(Request $request)
    {
        if ( ! $request->has('s')) {
            return [];
        }

        $acronym = Acronym::where('acronym', 'LIKE', $request->get('s'))->first();

        return $acronym;
    }
}
