<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardItem extends Model
{
    protected $fillable = [
        'judul',
        'brand',
        'deskripsi',
        'gambar',
        'type' // carousel | gradient_card | general
    ];
}
