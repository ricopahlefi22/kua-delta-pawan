<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\WebConfig;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    function index()
    {
        $data['news'] = News::orderBy('created_at')->take(4)->get();
        $data['web'] = WebConfig::first();

        return view('index', $data);
    }
}
