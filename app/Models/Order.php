<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class Order extends Model
{
    use HasFactory;

    // Les attributs pouvant être assignés en masse
    protected $fillable = ['customer_id','read'];

    // Les relations avec d'autres modèles

    /**
     * Relation avec le modèle Customer
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Relation avec le modèle OrderItem
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}

