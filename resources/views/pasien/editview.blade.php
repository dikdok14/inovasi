@extends('tampilan.master')
@section('t','User')
@section('konten')
<div class="container-fluid">
    <h3 class="h3 mb-2 text-gray-800">Edit Data Pasien</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/pasien/{{$p->id}}/rubah" method="POST">
                {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" value="{{$p->nama}}">
              </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" cols="30" rows="10" required>{{$p->alamat}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Rubah</button>
            </div>
            </form>
    </div>
</div>
@endsection