<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function about() {
        $title = 'About page';
        return view('pages.about', compact('title'));
    }

}
