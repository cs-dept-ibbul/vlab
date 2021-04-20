<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    use HasFactory;
    public $incrementing = false;
    
    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];
    // public function newQuery($excludeDeleted = true) {
    //     return parent::newQuery($excludeDeleted)
    //         ->where('status', '=', 'Active');
    // }

    public function results()
    {
        return $this->hasMany(ExperimentResult::class);
    }
    
}
