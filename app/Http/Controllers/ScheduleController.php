<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    function index(){
        $data['title'] = 'Jadwal Pernikahan';
        return view('admin.schedule.index', $data);
    }
}
