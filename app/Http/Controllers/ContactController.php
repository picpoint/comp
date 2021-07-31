<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function send() {
        Mail::to('riminbox@inbox.ru')->send(new TestMail());
        $title = 'Mail page';
        return view('send', compact('title'));
    }

}
