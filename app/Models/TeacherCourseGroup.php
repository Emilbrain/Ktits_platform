<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourseGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'course_id',
        'group_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    // Курс
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Группа
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
