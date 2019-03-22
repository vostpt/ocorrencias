<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::all();

        return response()->view('backend.users.index', ['users' => $users]);
    }
}