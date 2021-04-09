<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('status', '=', 'Active');
    }
    
    public function course_experiment()
    {
        return $this->hasMany(CourseExperiment::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
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
