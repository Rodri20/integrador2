<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'total',
        'created_at',
        'updated_at',  
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
  
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
                    ->withPivot('quantity', 'price');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
