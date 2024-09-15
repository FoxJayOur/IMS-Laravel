<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkInProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'qty',
        'description',
        'stage_of_production',
        'eta',
        'total_cost',
        'raw_materials',
    ];
}
