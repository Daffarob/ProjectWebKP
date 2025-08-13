<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories'; // Specify the table name if it's not 'categories'
    protected $fillable = ['name', 'description']; // Specify fillable fields

    // Define any relationships, scopes, or methods as needed
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id'); // Adjust 'category_id' to the actual foreign key in your products table
    }
}
