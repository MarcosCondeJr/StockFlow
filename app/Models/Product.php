<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with products
     * 
     * @var string
    */
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'cost_price',
        'sale_price',
        'quantity_stock'
    ];

    /**
     * Return the linked category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
