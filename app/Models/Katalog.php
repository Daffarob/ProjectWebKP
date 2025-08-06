<?php

namespace App\Models;

// app/Models/Katalog.php

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $fillable = ['nama_mesin', 'harga', 'spesifikasi', 'gambar', 'jenis'];
}
