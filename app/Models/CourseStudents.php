<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudents extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function course(){
       return $this->belongsTo(Course::class, 'course_id');
    }

    /*public function students()
    {
        return $this->hasMany(User::class, 'user_id');
    }*/
    public function students()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected $table = 'user_courses';
    protected $fillable = [
        'course_id',
    ];
}
