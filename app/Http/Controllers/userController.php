<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use File;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
        $this->middleware('user')->except('');
    }

    public function dashboard()
    {
        $totalArsips = DB::table('arsips')->get()->count();
        return view('index',compact('totalArsips'));
    }

    public function daftarArsipBuat()
    {
        $dariArsips = DB::table('arsip_dari')->get();
        return view('buatArsip',compact('dariArsips'));
    }

    public function daftarArsipBuatPost(Request $request)
    {
        $validateData = $request->validate([
            'nama'      => 'required|string',
            'dari'      => 'required|string',
            'tanggal'   => 'required',
            'file'      => 'required|file|mimes:doc,pdf,docx|max:50000',
        ]);

        $id = Auth::user()->id; 
        $unique = uniqid();
        $extFile = $request->file->getClientOriginalExtension();
        $namaFile = $unique."{$id}".".".$extFile;
        $request->file->move('arsip',$namaFile);
        $path = "/arsip/".$namaFile;

        DB::table('arsips')->insert([
            'id_user'   => $id,
            'nama'      => $validateData['nama'],
            'dari'      => $validateData['dari'],
            'tanggal'   => $validateData['tanggal'],
            'file'      => $path,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('daftarArsip')->with('berhasil','Arsip berhasil dibuat');
        
    }

    public function daftarArsipEdit($id)
    {
        $arsip = DB::table('arsips')->where('id',$id)->first();
        $dariArsips = DB::table('arsip_dari')->get();
        return view('editArsip',compact('arsip','dariArsips'));
    }

    public function daftarArsipEditPost($id,Request $request)
    {
        $validateData = $request->validate([
            'nama'      => 'required|string',
            'dari'      => 'required|string',
            'tanggal'   => 'required',
            'file'      => 'nullable|file|mimes:docx,doc,pdf|max:50000',
        ]);

        $arsip = DB::table('arsips')->where('id',$id)->first();
        $iduser = Auth::user()->id; 
        $unique = uniqid();

        DB::table('arsips')->where('id',$id)->update([
            'id_user'   => $iduser,
            'nama'      => $validateData['nama'],
            'dari'     => $validateData['dari'],
            'tanggal'     => $validateData['tanggal'],
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if($request->file)
        {
            File::delete(public_path().$arsip->file);

            $extFile = $request->file->getClientOriginalExtension();
            $namaFile = $unique.$iduser.".".$extFile;
            $request->file->move('arsip',$namaFile);
            $path = "/arsip/".$namaFile;

            DB::table('arsips')->where('id',$id)->update([           
                'file'      => $path,
            ]);
        }   

        return redirect()->route('daftarArsip')->with('berhasil','Arsip berhasil diedit');
    }

    public function daftarArsipDelete($id,Request $request)
    {   
        $arsip = DB::table('arsips')->where('id',$id)->first();
        File::delete(public_path().$arsip->file);

        DB::table('arsips')->where('id',$id)->delete();

        return redirect()->route('daftarArsip')->with('berhasil','Arsip berhasil dihapus');
    }
}
