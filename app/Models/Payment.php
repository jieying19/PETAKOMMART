<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'customer_name',
        'total_amount',
    ];
    public function items()
    {
        return $this->hasMany(Inventory::class);
    }
}