<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use File;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('admin')->except('dariArsip','dariArsipBuat','dariArsipPost','dariArsipDelete');
    }

    public function dashboard()
    {
        $totalUsers = DB::table('users')->get()->count();
        $totalArsips = DB::table('arsips')->get()->count();
        return view('index',compact('totalUsers','totalArsips'));
    }

    public function daftarBuat()
    {
        return view('buatAkun');
    }

    public function daftarBuatPost(Request $request)
    {
        $validateData = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'role'      => 'required|in:admin,bupati,user',
            'password'  => 'required|confirmed|min:8|string',
        ]);

        DB::table('users')->insert([
            'name'      => $validateData['name'],
            'email'     => $validateData['email'],
            'role'      => $validateData['role'],
            'password'  => Hash::make($validateData['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('daftarUser')->with('berhasil','Akun baru berhasil dibuat');
    }

    public function daftarEdit($id)
    {
        $akun = DB::table('users')->where('id',$id)->first();

        return view('editAkun',compact('akun'));
    }

    public function daftarEditPost($id, Request $request)
    {
        $akun = DB::table('users')->where('id',$id)->first();
        $validateData = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'role'      => 'required|in:admin,bupati,user',
            'password'  => 'nullable|confirmed|min:8|string',
        ]);

        DB::table('users')->where('id',$id)->update([
            'email'     => $validateData['email'],
            'role'      => $validateData['role'],
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if($validateData['password'])
        {
            DB::table('users')->where('id',$id)->update([
                'password'  => Hash::make($validateData['password']),
            ]);
        }

        if($validateData['name'] != $akun->name)
        {
            DB::table('users')->where('id',$id)->update([
                'name'      => $validateData['name'],
            ]);
        }

        return redirect()->route('daftarUser')->with('berhasil','Akun berhasil diedit');
    }

    public function daftarDelete($id,Request $request)
    {
        DB::table('users')->where('id',$id)->delete();

        return redirect()->route('daftarUser')->with('berhasil','Akun berhasil dihapus');
    }

    public function dariArsip()
    {
        // return view('apaantuh');
    }

    public function dariArsipBuat()
    {
        $dariArsips = DB::table('arsip_dari')->get();
        return view('buatDari',compact('dariArsips'));
    }

    public function dariArsipPost(Request $request)
    {
        $validateData = $request->validate([
            'nama'      => 'required|string',
        ]);

        DB::table('arsip_dari')->insert([
            'nama'      => $validateData['nama'],
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('dariArsipBuat')->with('berhasil','Berhasil ditambahkan');
    }

    public function dariArsipDelete($id,Request $request)
    {
        DB::table('arsip_dari')->where('id',$id)->delete();

        return redirect()->route('dariArsipBuat')->with('berhasil','Berhasil dihapus');
    }
}
