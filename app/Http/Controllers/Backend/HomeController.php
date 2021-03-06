<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Occurrence;

class HomeController extends Controller
{

    public function __construct()
    {
        // middleware in web.php
        // - admin.auth
    }

    public function index()
    {
        $activeCounter = Occurrence::activeCounter();

        $activeFires = Occurrence::activeFires();

        $todayOccurrences     = Occurrence::today();
        $yesterdayOccurrences = Occurrence::yesterday();

        return response()->view('backend.index', [
            'activeCounter'        => $activeCounter,
            'activeFires'          => $activeFires,
            'todayOccurrences'     => $todayOccurrences,
            'yesterdayOccurrences' => $yesterdayOccurrences,
        ]);
    }
}