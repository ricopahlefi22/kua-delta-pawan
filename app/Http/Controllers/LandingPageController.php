<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index()
    {
        return view('landing-page.index');
    }

    function goal()
    {
        return view('landing-page.goal');
    }

    function structure()
    {
        return view('landing-page.structure');
    }

    function gallery()
    {
        return view('landing-page.gallery');
    }
}
