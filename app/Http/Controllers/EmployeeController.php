<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create( Request $request)
    {
        $validation = \Validator::make( $request->all(),[
            'code'  => 'required|unique:employees',
            'name'  => 'required',
            'ip'    => 'required|unique:employees',
        ]);

        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
        }

        $employee = Employee::create( $request->all());

        return ['status' => 'success'];
    }
}
