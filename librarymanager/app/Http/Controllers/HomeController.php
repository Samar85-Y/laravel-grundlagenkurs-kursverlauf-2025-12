<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $headline = 'Wilkommen im Librarymanager';
        $today = now()->format('d.m.Y');


        //pruft view
        return view('home', [
            'headline' =>$headline,
            'heute' =>$today
        ]);
}
}