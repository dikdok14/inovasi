<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeObat extends Model
{
    use HasFactory;
    protected $table = 'beliobat';
    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
}
