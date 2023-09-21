<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class house extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'delala_id',
        'image',
        'details',
        'location',
        'area',
        'price',
        'status',
        'approval',
    ];
}