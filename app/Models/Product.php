<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // Tidak perlu mendefinisikan $table jika namanya 'products'

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'stock',
    ];

    // Relasi dengan model Category
    public function category()
    {
        // Hubungan Many-to-One
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
