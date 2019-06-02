<?php

namespace App;

use App\EmployeeWebHistory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function histories()
    {
        return $this->hasMany( EmployeeWebHistory::class, 'ip', 'ip');
    }
    
}
