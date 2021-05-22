<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

    private $roleId = [
        'student'=>'3e836670-a9d5-4c78-bfb8-0bdcda27263c',
        'schoold_admin'=>'61947969-78e6-4619-be35-50541aef8cb3',
        'faculty_admin'=>'9260655c-6933-45a0-8d01-6de3d6a52657',
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('status', '=', 'Active');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function students()
    {
        return $this->hasMany(User::class)->where('role_id', $this->roleId['student']);;
    }
    public function courses_students()
    {
        return $this->hasMany(CourseStudents::class);
    }
    
}
