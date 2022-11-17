@extends('tampilan.master')
@section('t','Obat')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Master Pembelian Obat</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/botambah" class="btn btn-primary">Tambah Transaksi Obat</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NAMA PASIEN</th>
                            <th>JUMLAH</th>
                            <th>TOTAL HARGA</th>
                            <th>TANGGAL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    @foreach ($bo as $uu)
                    <tbody>
                        <tr>
                            <td>{{$uu->pasien->nama}}</td>
                            <td>{{$uu->jumlah}}</td>
                            <td>{{$uu->total}}</td>
                            <td>{{$uu->created_at}}</td>
                            <td>
                                <a href="/bobat/{{$uu->id}}/detail">Detail Pembelian</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
