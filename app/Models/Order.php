<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'status',
        'user_id',
        'total',
<<<<<<< HEAD
        'created_at',    // Asegúrate de agregar esto si lo usas
=======
        'tracking_code',
>>>>>>> 88f1c62b379241788f4a652cc6f5f212482e09e5
    ];

    // Definir los campos de fecha
    protected $dates = [
        'created_at',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con los productos
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
