<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'logo'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
