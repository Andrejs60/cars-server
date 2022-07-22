<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      ""
    ];

    /**
     * Get the order associated with the order item.
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
