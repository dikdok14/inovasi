@extends('tampilan.master')
@section('t','User')
@section('konten')
<div class="container-fluid">
    <h3 class="h3 mb-2 text-gray-800">Edit Data Pegawai</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/pegawai/{{$ev->id}}/rubah" method="POST">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" value="{{$ev->nama}}">
              </div>
              <div class="form-group">
                <label for="">Telepon</label>
                <input type="number" name="telp" class="form-control" placeholder="Masukan Nomor Telepon Anda" value="{{$ev->telp}}">
              </div>
              <div class="form-group">
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" placeholder="Masukan Jabatan Anda" value="{{$ev->jabatan}}">
              </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" cols="30" rows="10" required>{{$ev->alamat}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Rubah</button>
            </div>
            </form>
    </div>
</div>
@endsection