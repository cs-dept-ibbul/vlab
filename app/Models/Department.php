<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('status', '=', 'Active');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }    
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }   
}
