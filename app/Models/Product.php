<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_ref', 'name', 'stock', 'price'];
    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_ref');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

        // Relation avec le modèle OrderItem (produits commandés)
        public function orderItems()
        {
            return $this->hasMany(OrderItem::class);
        }

}
