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
        'media_id',
        'details',
        'location',
        'area',
        'price',
        'approval',
        'status',

    ];
}