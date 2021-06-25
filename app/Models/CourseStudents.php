<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WeeklyWork;
class CourseStudents extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function course(){
       return $this->belongsTo(Course::class, 'course_id');
    }

    public function weekly_work_experiment(){
       return $this->hasManyThrough(WeeklyWorkExperiment::class, weeklyWork::class,'course_id','weekly_work_id','course_id','id');
    }       

    public function weekly_work(){
       return $this->hasMany(WeeklyWork::class, 'course_id', 'course_id');
    }

    /*public function students()
    {
        return $this->hasMany(User::class, 'user_id');
    }*/
    public function students()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    protected $table = 'user_courses';
    protected $fillable = [
        'course_id', 'user_id'
    ];
}
