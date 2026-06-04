<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'No category'
        ]);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
    }

    public function gallery()
    {
        return $this->morphMany(Image::class, 'imageable')->where('type', 'gallery');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
