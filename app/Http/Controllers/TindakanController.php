<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tindakan;
use App\Models\BeTindakan;
use App\Models\DBTindakan;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;

class TindakanController extends Controller
{
    public function index()
    {
        $t = Tindakan::all();
        return view('tindakan.index',compact(['t']));
    }

    public function simpan(Request $r)
    {
        $s = Tindakan::create($r->all());
        return redirect('/tindakan');
    }

    public function formedit($id)
    {
        $p = Tindakan::find($id);
        return view('tindakan.editview',compact(['p']));
    }

    public function rubah(Request $r , $id)
    {
        $g = Tindakan::find($id);
        $g->update($r->all());
        return redirect('/tindakan');
    }

    public function hapus($id)
    {
        $h = Tindakan::find($id);
        $h->delete();
        return redirect('/tindakan');
    }

    public function index2()
    {
        $bo = BeTindakan::all();
        return view('btindakan.index',compact(['bo']));
    }

    public function tambah()
    {
        $o = Tindakan::all();
        $p = Pasien::all();
        $jml = DB::table('detail_belitindakan')->where('id_pasien', '0')->count();
        $detail = DBTindakan::where('id_pasien','0')->get();
        $total = 0;
        foreach ($detail as $k) {
            $subtotal = $k->harga * $k->jumlah;
            $total = $total + $subtotal;
        } 
        return view('btindakan.tambah',compact(['o','p','total','jml','detail']));
    }

    public function beli(Request $r)
    {
        $obat = Tindakan::find($r->idt);

        $t = new DBTindakan();
        $t->idt = 0;
        $t->id_pasien = 0;
        $t->id_tindakan = $r->idt;
        $t->jumlah = $r->jml;
        $t->harga = $obat->harga;
        $t->save();
        return redirect()->back();

    }

    public function nota(Request $r)
    {
        $beli = BeTindakan::create($r->all());

        $tran = DBTindakan::where('id_pasien','0')->get();
        foreach($tran as $item)
        {
            $item->idt = $beli->id;
            $item->id_pasien = $beli->id_pasien;
            $item->update();

        }

        return redirect('/btindakan');
    }

    public function detail($id)
    {
        $de = DBTindakan::where('idt',$id)->get();
        $d = BeTindakan::find($id);
        return view('/btindakan.detail',compact(['d','de']));
    }

    public function cetak($id)
    {
        $ce = DBTindakan::where('idt',$id)->get();
        $d = BeTindakan::find($id);
        return view('/btindakan.cetak',compact(['d','ce']));
    }
}
