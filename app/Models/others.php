<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class others extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'delala_id',
        'image',
        'details',
        'price',
        'approval',
    ];
}