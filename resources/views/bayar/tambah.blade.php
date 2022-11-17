@extends('tampilan.master')
@section('title','Tambah Transaksi Pembayaran')
@section('konten')
<div class="container">
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
    
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
            </div>
            <div class="card-body">
                <form action="/bayar/obat" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="">Obat</label>
                    <select class="form-control" name="idb">
                        @foreach ($o as $item)
                            <option value="{{$item->id}}">{{$item->nama}} | {{$item->harga}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="jml" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Masukan Keranjang</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
    
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tindakan</h6>
            </div>
            <div class="card-body">
                <form action="/bayar/tindakan" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="">Tindakan</label>
                    <select class="form-control" name="idt">
                        @foreach ($t as $item)
                            <option value="{{$item->id}}">{{$item->nama}} | {{$item->harga}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="jml" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Masukan Keranjang</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">NOTA</h6>
            </div>
            <div class="card-body">
                <form action="/bayar/nota" method="post" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Pasien</label>
                        <select class="form-control" name="id_pasien">
                            @foreach ($p as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Jenis Obat</label>
                            <input type="number" class="form-control" name="jeo" value="{{$jenis}}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Jumlah Obat</label>
                            <input type="number" class="form-control" name="juo" value="{{$jml}}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Total Bayar Obat</label>
                            <input type="number" class="form-control" name="to" value="{{$total}}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Jenis Tindakan</label>
                            <input type="number" class="form-control" name="jet" value="{{$jenist}}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Jumlah Tindakan</label>
                            <input type="number" class="form-control" name="jut" value="{{$jmlt}}" readonly>
                        </div>
                        <div class="col">
                            <label for="">Total Tindakan</label>
                            <input type="number" class="form-control" name="tt" value="{{$totalt}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Keseluruhan</label>
                        <input type="number" class="form-control" name="semua" value="{{$semua}}" readonly>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Keranjang Obat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $item)
                                <tr>
                                    <td>{{$item->obat->nama}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>
                                        <a href="/bobat/{{$item->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Membatalkan Membeli Barang Tersebut ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Keranjang Tindakan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailt as $item)
                                <tr>
                                    <td>{{$item->tindakan->nama}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>
                                        <a href="/bobat/{{$item->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Membatalkan Membeli Barang Tersebut ?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection