<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;
use App\Models\ProductAttribute;

class AttributeValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * 
     * @var string
     */
    protected $table = 'attribute_values';

    /**
     * @var array
     */
    protected $fillable = [
        'attribute_id', 'value', 'price'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'attribute_id' => 'integer',
    ];

    /**
     * inverse of this relationship using the belongsTo method
     * @return BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class);
    }

}
