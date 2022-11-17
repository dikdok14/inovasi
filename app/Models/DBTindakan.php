<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBTindakan extends Model
{
    use HasFactory;
    protected $table = 'detail_belitindakan';
    protected $guarded = ['id'];

    public function tindakan()
    {
        return $this->hasOne(Tindakan::class, 'id', 'id_tindakan');
    }

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
}

