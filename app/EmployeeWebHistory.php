<?php

namespace App;

use App\Employee;   
use Illuminate\Database\Eloquent\Model;

class EmployeeWebHistory extends Model
{

    protected $guarded = [];
    
    public function employee()
    {
        return $this->belongsTo( Employee::class, 'ip', 'ip');
    }
    
}
