<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
    
    public function BeObat()
    {
        return $this->hasOne(BeObat::class, 'id_bayar', 'idb');
    }

    public function BeTindakan()
    {
        return $this->hasOne(BeTindakan::class, 'id_bayar', 'idt');
    }
}
