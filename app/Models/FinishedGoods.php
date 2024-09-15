<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedGoods extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'qty',
        'description',
        'sku',
        'total_sold',
        'cost',
    ];
}
