<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product->Category
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    //$product->image
    public function images()
    {
      return $this->hasMany(ProductImage::class);
    }
}
