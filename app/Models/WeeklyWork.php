<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyWork extends Model
{
    use HasFactory;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];
   public $incrementing = false;

    protected $appends = [
        'expired',
    ];

    public function getExpiredAttribute()
    {
        $today      = Carbon::now();
        $diff       = date_diff(date_create($this->date_close),$today);
        $daysLeft   = $diff->format("%R%a");
        $hasExpired = $daysLeft > 0;

        return $hasExpired;
    }
     public function user_course()
    {
        return $this->belongsTo(CourseStudents::class, 'course_id');
    }
     
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
         
    public function weekly_work_experiments()
    {
        return $this->hasMany(WeeklyWorkExperiment::class, 'weekly_work_id');
    }
}

class WeeklyWorkExperiment extends Model
{
    use HasFactory;
   public $incrementing = false;


    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

 
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function experiments()
    {
        return $this->belongsTo(Experiment::class, 'experiment_id');
    }
    public function weeklyWork()
    {
        return $this->belongsTo(WeeklyWork::class, 'weekly_work_id');
    }
}
