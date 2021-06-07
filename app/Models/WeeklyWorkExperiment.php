<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Course::class)->using(weeklyWork::class,'weekly_work_id');
    }
    public function experiments()
    {
        return $this->belongsTo(Experiment::class, 'experiment_id');
    }
    public function weeklyWork()
    {
      return $this->belongsTo(WeeklyWork::class);
    }

    public function result()
    {
      return $this->hasMany(ExperimentResult::class,'weekly_work_id','id');
    }
}
