<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labour extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'delala_id',
        'image',
        'details',
        'name',
        'skills',
        'type',
        'salary',
        'approval',
        'age',
        'Gender',

    ];
}