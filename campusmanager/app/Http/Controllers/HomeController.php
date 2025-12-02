<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $headline = 'Wilkommen im Campusmanager';
        $today = now()->format('d.m.Y');


        //pruft view
        return view('home', [
            'headline' =>$headline,
            'heute' =>$today
        ]);
    }

    public function about() {
        $headline = "Über diesen Kurs";

        return view('about', [
            'headline' => $headline
        ]);
    }
}
