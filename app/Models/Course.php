<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $incrementing = false;
    use HasFactory;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

    // public function newQuery($excludeDeleted = true) {
    //     return parent::newQuery($excludeDeleted)
    //         ->where('status', '=', 'Active');
    // }
    
    public function course_experiment()
    {
        return $this->hasMany(CourseExperiment::class,'course_id');
    }

    public function course_resources()
    {
        return $this->hasMany(CourseResources::class,'course_id');
    }

    public function weekly_work()
    {
        return $this->hasMany(weeklyWork::class,'course_id');
    }

    public function course_student()
    {
        return $this->hasMany(CourseStudents::class,'course_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'user_courses');
    }

    public function experiments()
    {
        return $this->belongsToMany(Experiment::class, 'course_experiment');
    }

    public function results(){
        return $this->hasMany(ExperimentResult::class,'course_id');
    }
    
}

class CourseResources extends Model
{
    use HasFactory;
    public $incrementing = false;
}

class UserCourses extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}

class CourseExperiment extends Model
{
    use HasFactory;
    protected $table = 'course_experiment';
    public $incrementing = false;

    public function experiments()
    {
        return $this->belongsTo(Experiment::class, 'experiment_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

class CourseInstructor extends Model
{
    use HasFactory;
    protected $table = 'course_instructor';
    public $incrementing = false;
}
/*
class CourseStudents extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function students()
    {
        return $this->hasMany(User::class, 'id');
    }
    
    public function course(){
        $this->belongsTo(Course::class);
    }

    protected $table = 'user_courses';
    protected $fillable = [
        'course_id',
    ];
}
*/