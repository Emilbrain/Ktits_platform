<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'comment',
        'theory',
        'task',
        'video_link',
        'video_avatar',
        'stat',
        'status',
        'course_id',
        'module',
        'slug'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

}
