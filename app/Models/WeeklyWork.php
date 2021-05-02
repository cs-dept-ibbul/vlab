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

    protected $appends = [
        'expired',
    ];

    public function getExpiredAttribute()
    {
        $today = Carbon::now();
        $hasExpired = $this->date_close < $today->toDateString();
        
        return $hasExpired;
    }
}

class WeeklyWorkExperiment extends Model {
    use HasFactory;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function experiments()
    {
        return $this->belongsToMany(Experiment::class, 'weekly_work_experiments', 'id');
    }
    
    public function weeklyWork()
    {
        return $this->belongsTo(WeeklyWork::class, 'weekly_work_id');
    }


}
