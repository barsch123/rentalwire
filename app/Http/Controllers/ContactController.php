<?php

namespace App\Http\Controllers;

use App\Jobs\ContactJob;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function index()
    {
        return view('contact');
    }
}
