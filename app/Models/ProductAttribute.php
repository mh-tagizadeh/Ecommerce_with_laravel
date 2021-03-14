<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\AttributeValue;
use App\Models\Attribute;


class ProductAttribute extends Model
{
    use HasFactory;


    protected $fillable = ['product_id', 'quantity', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributesValues()
    {
        return $this->belongsToMany(AttributeValue::class);
    }


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
