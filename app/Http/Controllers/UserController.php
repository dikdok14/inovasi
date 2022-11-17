<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $u = User::all();
        return view('user.index',compact(['u']));
    }

    public function simpan(Request $s)
    {
        $u = new User;
        $u->name = $s->n;
        $u->email = $s->e;
        $u->password = bcrypt($s->p);
        $u->save();
        return redirect('/user');
    }

    public function formedit($id)
    {
        $f = User::find($id);
        return view('user.editview',compact(['f']));
    }
    
    public function rubah(Request $r , $id)
    {
        $u = User::find($id);
        $u->update($r->all());
        return redirect('/user');
    }

    public function hapus($id)
    {
        $h = User::find($id);
        $h->delete();
        return redirect('/user');
    }
}
