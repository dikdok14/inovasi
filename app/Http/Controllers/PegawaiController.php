<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $p = Pegawai::all();
        return view('pegawai.index',compact(['p']));
    }

    public function simpan(Request $r)
    {
        $p = Pegawai::create($r->all());
        return redirect('/pegawai');
    }

    public function formedit($id)
    {
        $ev = Pegawai::find($id);
        return view('/pegawai.editview',compact(['ev']));
    }

    public function rubah(Request $r , $id)
    {
        $b = Pegawai::find($id);
        $b->update($r->all());
        return redirect('/pegawai');
    }

    public function hapus($id)
    {
        $h = Pegawai::find($id);
        $h->delete();
        return redirect('/pegawai');
    }
}
