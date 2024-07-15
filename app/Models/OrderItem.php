<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Relación con el pedido.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relación con el producto.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
