<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    use HasFactory;

    protected $fillable = [
        // Add other fillable fields here
        'name',
        'email',
        'address',
        'qualification',
        'gender',
        // 'joining_date',
        // 'leave_date',
        // ... other fields ...
    ];
}
