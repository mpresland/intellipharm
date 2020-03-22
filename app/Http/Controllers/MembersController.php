<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index(Request $request)
    {
        return view('members.index');
    }
}
