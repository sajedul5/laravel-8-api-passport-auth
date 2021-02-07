<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'home';
        $data['name'] = 'Hello Shakil';
        $data['num'] = 546;
        $data['arr'] = ['Shakil','Talat','Shifat','Rifat','Rubel'];
        return view('home', $data);
    }


    public function contact()
    {
        $data['title'] = 'contact';
        $data['contact'] = 'Conatact Us';
        return view('contact', $data);
    }
}
