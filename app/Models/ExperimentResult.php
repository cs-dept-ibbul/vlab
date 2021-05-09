<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperimentResult extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function experiments()
    {
    	return $this->belongsTo(Experiment::class, 'experiment_id');
    }

     public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
