<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['company_name'];

    public function taskadds()
    {
        return $this->hasMany(Taskadd::class, 'department_id');
    }

}
