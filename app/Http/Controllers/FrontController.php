<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class FrontController extends Controller
{
    public function index()
    {
        $photos = Photo::approved()->get();

        return view('front.index', compact('photos'));
    }
}
