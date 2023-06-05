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
}
