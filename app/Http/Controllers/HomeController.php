<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class HomeController extends Controller
{
    public function index(){

        $authors = Author::all();

        return view('welcome', compact('authors'));
    }
}
