@extends('tampilan.master')
@section('t','User')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Master User</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data User
              </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>PASSWORD</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    @foreach ($u as $uu)
                    <tbody>
                        <tr>
                            <td>{{$uu->name}}</td>
                            <td>{{$uu->email}}</td>
                            <td>{{$uu->password}}</td>
                            <td>
                                <a href="/user/{{$uu->id}}/edit" class="btn btn-secondary"><i class="fa fa-pen"></i></a>
                                <a href="/user/{{$uu->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Data Akan Di Hapus ?')"><i class="fa fa-trash"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/user/simpan" method="POST">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="">Nama </label>
            <input type="text" name="n" class="form-control" placeholder="Masukan Nama Anda">
          </div>
          <div class="form-group">
            <label for="">Email </label>
            <input type="email" name="e" class="form-control" placeholder="Masukan Email Anda">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="p" class="form-control" placeholder="Masukan Password Anda">
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
