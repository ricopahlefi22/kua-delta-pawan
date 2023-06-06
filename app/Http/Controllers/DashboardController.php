<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard()
    {
        $data['percent'] = 0;
        $data['title'] = 'Data Administrator';
        $data['wedding_count'] = Wedding::whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->count();
        $data['progress_wedding_count'] = Wedding::where('status', 'progress')->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->count();
        $data['complete_wedding_count'] = Wedding::where('status', 'complete')->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->count();

        if (!empty($data['wedding_count'])) {
            $data['percent'] = round(($data['complete_wedding_count'] / $data['wedding_count']) * 100);
        }
        $data['month'] = Carbon::now()->isoFormat('MMMM Y');
        return view('admin.dashboard', $data);
    }
}
