<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Tindakan;
use App\Models\DBObat;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index()
    {
        $obat = Obat::count();
        $tindakan = Tindakan::count();
        $beobat = DBObat::sum('jumlah');
        $pasien = Pasien::count();
        return view('/dashboard',compact(['obat','tindakan','beobat','pasien']));
    }
}
