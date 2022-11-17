@extends('tampilan.master')
@section('t','Obat')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Tindakan Pasien : {{$d->pasien->nama}}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/btindakan/{{$d->id}}/cetak" class="btn btn-primary"><i class="fa fa-print"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NAMA OBAT</th>
                            <th>JUMLAH</th>
                            <th>HARGA</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <?php 
                    $total = 0;
                    $tot_bayar = 0;
                    ?>
                    @foreach ($de as $uu)
                    <tbody>
                        <tr>
                            <td>{{$uu->tindakan->nama}}</td>
                            <td>{{$uu->jumlah}}</td>
                            <td>{{$uu->harga}}</td>
                            <?php $total = $uu->harga * $uu->jumlah 
                            ?>
                            <th>{{$total}}</th>
                        </tr>
                        <?php
                        $tot_bayar += $total
                        ?>
                    </tbody>
                    @endforeach
                    <tr>
                        <td colspan="3">TOTAL BAYAR</td>
                        <td>
                            {{$tot_bayar}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
