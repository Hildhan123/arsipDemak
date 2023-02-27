<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class bupatiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('bupati');
    }

    public function dashboard()
    {
        $totalUsers = DB::table('users')->get()->count();
        $totalArsips = DB::table('arsips')->get()->count();
        return view('index',compact('totalUsers','totalArsips'));
    }
}
