<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
}

class CourseResources extends Model
{
    use HasFactory;
}

class CourseExperiment extends Model
{
    use HasFactory;
    protected $table = 'course_experiment';
}

class CourseInstructor extends Model
{
    use HasFactory;
    protected $table = 'course_instructor';
}
class CourseStudents extends Model
{
    use HasFactory;
    protected $table = 'user_courses';
    protected $fillable = [
        'course_id',
    ];
}
