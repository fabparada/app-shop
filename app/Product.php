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

    public function getFeaturedImageUrlAttribute()
    {
      $featuredImage = $this->images()->where('featured', true)->first();
      if(!$featuredImage)
        $featuredImage = $this->images()->first();
      if($featuredImage) {
        return $featuredImage->UrlPath;
      }
      //default
      return '/images/products/default.jpg';
    }
     //accesor

    public function getCategoryNameAttribute()
    {
      if ($this->category)
        return $this->category->name;
      return 'General';  
    }
}
