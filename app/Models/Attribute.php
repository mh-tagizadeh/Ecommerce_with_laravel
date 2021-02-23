<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    /** 
     * @var array 
     */
    protected $fillable = [
        'code', 'name', 'frontend_type', 'is_filterable', 'is_required'
    ];

    /** 
     * @var array 
     */
    protected $cats = [
        'is_filterable' => 'boolean',
        'is_required' => 'boolean',
    ];
}
