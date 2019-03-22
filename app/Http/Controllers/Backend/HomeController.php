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

        return response()->view('backend.index', ['activeCounter' => $activeCounter]);
    }
}