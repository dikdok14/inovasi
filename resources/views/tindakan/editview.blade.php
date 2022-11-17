@extends('tampilan.master')
@section('t','User')
@section('konten')
<div class="container-fluid">
    <h3 class="h3 mb-2 text-gray-800">Edit Data Tindakan</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/tindakan/{{$p->id}}/rubah" method="POST">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" value="{{$p->nama}}">
              </div>
              <div class="form-group">
                <label for="">Jenis</label>
                <input type="text" name="jenis" class="form-control" placeholder="Masukan Nama Anda" value="{{$p->jenis}}">
              </div>
              <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukan Nama Anda" value="{{$p->harga}}">
              </div>
              <button type="submit" class="btn btn-primary">Rubah</button>
            </div>
            </form>
    </div>
</div>
@endsection