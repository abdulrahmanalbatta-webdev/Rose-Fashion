<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Accessors
    public function getImagePathAttribute()
    {
        if ($this->image->path) {
            return asset('storage/' . $this->image->path);
        }
    }

    // Mutators
    public function setNameAttribute()
    {
        $name = [
            'en' => request()->name_en,
            'ar' => request()->name_ar
        ];

        $this->attributes['name'] = json_encode($name);
    }
}
