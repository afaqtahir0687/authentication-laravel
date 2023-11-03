<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        // Add other fillable fields here
        'name',
        'author',
        'year',
        'price',
        // ... other fields ...
    ];

    // Rest of your model code...
}

