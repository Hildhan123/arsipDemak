<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect()->route('admin');
        }
        else if(Auth::user()->role == 'bupati')
        {
            return redirect()->route('bup');
        }
        else
        {
            return redirect()->route('user');
        }
    }

    public function daftarUser()
    {
        $daftarUser = DB::table('users')->get();
        return view('daftarAkun', compact('daftarUser'));
    }

    public function daftarArsip()
    {
        $daftarArsip = DB::table('arsips')
                ->join('users','users.id','=','arsips.id_user')
                ->select('arsips.*','users.name')
                ->get();
        $dariArsips = DB::table('arsip_dari')->get();
        return view('daftarArsip', compact('daftarArsip','dariArsips'));
    }
}
