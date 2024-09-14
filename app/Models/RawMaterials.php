<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterials extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'qty',
        'description',
        'supplier',
        'expiry_date',
        'storage_condition',
        'measurement',
        'cost',
    ];
}
