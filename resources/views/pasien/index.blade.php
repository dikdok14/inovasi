@extends('tampilan.master')
@section('t','Pasien')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Master Pasien</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data Pasien
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>TELP</th>
                            <th>TANGGAL LAHIR</th>
                            <th>UMUR</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    @foreach ($p as $pp)
                    <tbody>
                        <tr>
                            <td>{{$pp->nama}}</td>
                            <td>{{$pp->alamat}}</td>
                            <td>{{$pp->telp}}</td>
                            <td>{{$pp->ttl}}</td>
                            <td>{{$pp->umur}}</td>
                            <td>
                                <a href="/pasien/{{$pp->id}}/edit" class="btn btn-secondary"><i class="fa fa-pen"></i></a>
                                <a href="/pasien/{{$pp->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Data Akan Di Hapus ?')"><i class="fa fa-trash"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/pasien/simpan" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required>
          </div>
          <div class="form-group">
            <label for="">Telepon</label>
            <input type="number" name="telp" class="form-control" placeholder="Masukan Nomor Telepon Anda" required>
          </div>
          <div class="form-group">
            <label for="">TANGGAL LAHIR</label>
            <input type="date" name="ttl" class="form-control" placeholder="Masukan Jabatan Anda" required>
          </div>
          <div class="form-group">
            <label for="">UMUR</label>
            <input type="text" name="umur" class="form-control" placeholder="Masukan Umur Anda" required>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10" required></textarea>
          </div>
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
