<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "items",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        "items" => "array"
    ];

    /** 
     * Get the order items associated with the order.
     */
    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }

}
