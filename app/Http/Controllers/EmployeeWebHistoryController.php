<?php

namespace App\Http\Controllers;

use App\EmployeeWebHistory;
use Illuminate\Http\Request;

class EmployeeWebHistoryController extends Controller
{
    public function create(Request $request)
    {
        $validation = \Validator::make( $request->all(),[
            'url'   => 'required',
            'ip'    => 'required',
        ]);

        if($validation->fails()){
            $errors = $validation->errors();
            return $errors->toJson();
        }

        $employee = EmployeeWebHistory::create( $request->all());

        return ['status' => 'success'];
    }
}
