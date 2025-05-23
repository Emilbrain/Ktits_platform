<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function TeacherCourseGroup()
    {
        return $this->hasMany(TeacherCourseGroup::class);
    }
}
