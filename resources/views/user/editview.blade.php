@extends('tampilan.master')
@section('t','User')
@section('konten')
<div class="container-fluid">
    <h3 class="h3 mb-2 text-gray-800">Edit Data User</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
        <form action="/user/{{$f->id}}/rubah" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama User</label>
                <input type="text" name="name" class="form-control" value="{{$f->name}}">
            </div>
            <div class="form-group">
                <label for="">Email User</label>
                <input type="email" name="email" class="form-control" value="{{$f->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Rubah</button>
        </div>
        </form>
    </div>
</div>
@endsection