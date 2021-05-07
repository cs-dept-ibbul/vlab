<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudents extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function course(){
       return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->hasMany(User::class, 'id');
    }
    protected $table = 'user_courses';
    protected $fillable = [
        'course_id',
    ];
}
