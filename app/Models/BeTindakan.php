<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeTindakan extends Model
{
    use HasFactory;
    protected $table = 'belitindakan';
    protected $guarded = ['id'];

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
}
