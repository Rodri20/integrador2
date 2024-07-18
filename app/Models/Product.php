<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'image', 'stock'];
    

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'price');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}