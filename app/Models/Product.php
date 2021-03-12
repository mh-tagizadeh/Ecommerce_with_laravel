<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'brand_id', 'sku', 'name', 'slug', 'description', 'quantity',
        'weight', 'price', 'sale_price', 'status', 'featured',
    ];

    protected $catas = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
