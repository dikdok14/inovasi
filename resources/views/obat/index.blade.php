@extends('tampilan.master')
@section('t','Obat')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Master Obat</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data Obat
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>JENIS</th>
                            <th>HARGA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    @foreach ($o as $uu)
                    <tbody>
                        <tr>
                            <td>{{$uu->nama}}</td>
                            <td>{{$uu->jenis}}</td>
                            <td>{{$uu->harga}}</td>
                            <td>
                                <a href="/obat/{{$uu->id}}/edit" class="btn btn-secondary"><i class="fa fa-pen"></i></a>
                                <a href="/obat/{{$uu->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Data Akan Di Hapus ?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/obat/simpan" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="">Nama </label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda">
          </div>
          <div class="form-group">
            <label for="">Jenis </label>
            <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis Obat Anda">
          </div>
          <div class="form-group">
            <label for="">Harga </label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan Harga Obat">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
