<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class ProductCategory extends Model
{
    public function products() 
    {
        return $this->hasMany(Product::class);
    }
}
