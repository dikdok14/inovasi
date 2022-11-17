@extends('tampilan.master')
@section('t','Obat')
@section('konten')
<div class="container-fluid">
    <h3 class="h3 mb-2 text-gray-800">Edit Data Obat</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/obat/{{$f->id}}/rubah" method="POST">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" value="{{$f->nama}}">
              </div>
              <div class="form-group">
                <label for="">Jenis</label>
                <input type="text" name="jenis" class="form-control" placeholder="Masukan Nama Anda" value="{{$f->jenis}}">
              </div>
              <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="Masukan Nama Anda" value="{{$f->harga}}">
              </div>
              <button type="submit" class="btn btn-primary">Rubah</button>
            </div>
            </form>
    </div>
</div>
@endsection