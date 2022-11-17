@extends('tampilan.master')
@section('t','Obat')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Master Tindakan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/bttambah" class="btn btn-primary">Tambah Transaksi Tindakan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NAMA PASIEN</th>
                            <th>TOTAL HARGA</th>
                            <th>TANGGAL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    @foreach ($bo as $uu)
                    <tbody>
                        <tr>
                            <td>{{$uu->pasien->nama}}</td>
                            <td>{{$uu->harga}}</td>
                            <td>{{$uu->created_at}}</td>
                            <td>
                                <a href="/btindakan/{{$uu->id}}/detail">Detail Tindakan</a>
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
