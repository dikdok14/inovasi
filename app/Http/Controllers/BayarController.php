<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bayar;
use App\Models\Obat;
use App\Models\BeObat;
use App\Models\DBObat;
use App\Models\Tindakan;
use App\Models\BeTindakan;
use App\Models\DBTindakan;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;

class BayarController extends Controller
{
    public function index()
    {
        $b = Bayar::all();
        return view('bayar.index',compact(['b']));
    }

    public function tambah()
    {
        $o = Obat::all();
        $t = Tindakan::all();
        $p = Pasien::all();
        $jenis = DB::table('detail_beliobat')->where('id_pasien', '0')->count();
        $jml = DBObat::where('id_pasien',0)->sum('jumlah');
        $detail = DBObat::where('id_pasien','0')->get();

        $jenist = DB::table('detail_belitindakan')->where('id_pasien', '0')->count();
        $jmlt = DBTindakan::where('id_pasien',0)->sum('jumlah');
        $detailt = DBTindakan::where('id_pasien','0')->get();

        $total = 0;
        $totalt = 0;
        $semua = 0;
        foreach ($detail as $k) {
            $subtotal = $k->harga * $k->jumlah;
            $total = $total + $subtotal;
        } 

        foreach ($detailt as $k) {
            $subtotal = $k->harga * $k->jumlah;
            $totalt = $totalt + $subtotal;
        } 
        $semua = $total + $totalt;
        return view('bayar.tambah',compact(['t','o','p','detail','jml','total','jenis','jenist','jmlt','totalt','detailt','semua']));
    }

    public function obat(Request $o)
    {
            $obat = Obat::find($o->idb);
    
            $t = new DBObat();
            $t->idb = 0;
            $t->id_pasien = 0;
            $t->id_obat = $o->idb;
            $t->jumlah = $o->jml;
            $t->harga = $obat->harga;
            $t->save();
            return redirect()->back();
    }

    public function tindakan(Request $r)
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

    public function bayar(Request $b)
    {
        $bayar = new Bayar();
        $bayar->jumlah = $b->juo + $b->jut;
        $bayar->total = $b->to + $b->tt;
        $bayar->save();

        $bo = new BeObat();
        $bo->id_pasien = $b->id_pasien;
        $bo->id_bayar = $bayar->id;
        $bo->jumlah = $b->jeo;
        $bo->total = $b->to;
        $bo->save();

        $bt = new BeTindakan();
        $bt->id_pasien = $b->id_pasien;
        $bt->id_bayar = $bayar->id;
        $bt->harga = $b->tt;
        $bt->save();

        $udo = DBObat::where('id_pasien','0')->get();
        foreach($udo as $item)
        {
            $item->idb = $bo->id;
            $item->id_pasien = $bo->id_pasien;
            $item->update();
        }

        $udt = DBTindakan::where('id_pasien','0')->get();
        foreach($udt as $item)
        {
            $item->idt = $bt->id;
            $item->id_pasien = $bt->id_pasien;
            $item->update();
        }

        return redirect('/pembayaran');
    }
}
