<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'make',
        'delala_id',
        'model',
        'year',
        'mileage',
        'fueltype',
        'color',
        'price',
        'details',
        'image',
        'approval',
    ];
}