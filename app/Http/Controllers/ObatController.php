<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\BeObat;
use App\Models\Pasien;
use App\Models\DBObat;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index()
    {
        $o = Obat::all();
        return view('obat.index',compact(['o']));
    }

    public function simpan(Request $o)
    {
        $s = Obat::create($o->all());
        return redirect('/obat');
    }

    public function formedit($id)
    {
        $f = Obat::find($id);
        return view('obat.editview',compact(['f']));
    }

    public function rubah(Request $r , $id)
    {
        $o = Obat::find($id);
        $o->update($r->all());
        return redirect('/obat');
    }

    public function hapus($id)
    {
        $h = Obat::find($id);
        $h->delete();
        return redirect('/obat');
    }

    public function index2()
    {
        $bo = BeObat::all();
        return view('bobat.index',compact(['bo']));
    }

    public function tambah()
    {
        $o = Obat::all();
        $p = Pasien::all();
        $jml = DB::table('detail_beliobat')->where('id_pasien', '0')->count();
        $detail = DBObat::where('id_pasien','0')->get();
        $total = 0;
        foreach ($detail as $k) {
            $subtotal = $k->harga * $k->jumlah;
            $total = $total + $subtotal;
        } 
        return view('bobat.tambah',compact(['o','p','detail','jml','total']));
    }

    public function beli(Request $r)
    {
        $obat = Obat::find($r->idb);

        $t = new DBObat();
        $t->idb = 0;
        $t->id_pasien = 0;
        $t->id_obat = $r->idb;
        $t->jumlah = $r->jml;
        $t->harga = $obat->harga;
        $t->save();
        return redirect()->back();

    }

    public function nota(Request $r)
    {
        $beli = BeObat::create($r->all());

        $tran = DBObat::where('id_pasien','0')->get();
        foreach($tran as $item)
        {
            $item->idb = $beli->id;
            $item->id_pasien = $beli->id_pasien;
            $item->update();

        }

        return redirect('/bobat');
    }

    public function detail($id)
    {
        $de = DBObat::where('idb',$id)->get();
        $d = BeObat::find($id);
        return view('/bobat.detail',compact(['d','de']));
    }

    public function cetak($id)
    {
        $ce = DBObat::where('idb',$id)->get();
        $d = BeObat::find($id);
        return view('/bobat.cetak',compact(['d','ce']));
    }

    public function hapus2($id)
    {
        $bb = DBObat::find($id);
        $bb->delete();
        return redirect()->back();
    }
}
