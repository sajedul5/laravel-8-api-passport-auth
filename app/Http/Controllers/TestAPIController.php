<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestAPIController extends Controller
{
    public function testApi()
    {   
        //return "Hello Shakil Api Call";

        return [['name:' => 'Shakil', 'Email:' => 'shakil@gmail.com'],['name:' => 'Talat', 'Email:' => 'talat@gmail.com']];
    }
}
