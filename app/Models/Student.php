<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'birthday', 'address'
    ];

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_student', 'student_id', 'class_id');
    }
}
