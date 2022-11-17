<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $p = Pasien::all();
        return view('pasien.index',compact(['p']));
    }

    public function simpan(Request $r)
    {
        $p = Pasien::create($r->all());
        return redirect('/pasien');
    }

    public function formedit($id)
    {
        $p = Pasien::find($id);
        return view('pasien.editview',compact(['p']));
    }

    public function rubah(Request $e , $id)
    {
        $p = Pasien::find($id);
        $p->update($e->all());
        return redirect('/pasien');
    }

    public function hapus($id)
    {
        $p = Pasien::find($id);
        $p->delete();
        return redirect('/pasien');
    }
}
