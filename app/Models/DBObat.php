<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBObat extends Model
{
    use HasFactory;
    protected $table = 'detail_beliobat';
    protected $guarded = ['id'];

    public function obat()
    {
        return $this->hasOne(Obat::class, 'id', 'id_obat');
    }

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
}
