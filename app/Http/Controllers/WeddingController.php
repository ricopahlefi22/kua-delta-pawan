<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class WeddingController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Pernikahan';

        $nmeng = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $nmind = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        if ($request->month && $request->year) {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', date('m', strtotime($request->month)))->whereYear('date', $request->year)->get();
            $data['month'] = str_ireplace($nmeng, $nmind, $request->month);
            $data['month_eng'] = $request->month;
            $data['year'] = $request->year;
        } else if ($request->month) {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', date('m', strtotime($request->month)))->whereYear('date', Carbon::now()->format('Y'))->get();
            $data['month'] = str_ireplace($nmeng, $nmind, $request->month);
            $data['month_eng'] = $request->month;
            $data['year'] = Carbon::now()->isoFormat('Y');
        } else if ($request->year) {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', $request->year)->get();
            $data['month'] = Carbon::now()->isoFormat('MMMM');
            $data['month_eng'] = str_ireplace($nmind, $nmeng, Carbon::now()->isoFormat('MMMM'));
            $data['year'] = $request->year;
        } else {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->get();
            $data['month'] = Carbon::now()->isoFormat('MMMM');
            $data['month_eng'] = str_ireplace($nmind, $nmeng, Carbon::now()->isoFormat('MMMM'));
            $data['year'] = Carbon::now()->isoFormat('Y');
        }

        if ($request->ajax()) {
            return DataTables::of($data['weddings'])
                ->addIndexColumn()
                ->addColumn('user', function (Wedding $wedding) {
                    return empty($wedding->partner->name) ? $wedding->user->name . ' & ?' : $wedding->user->name . ' & ' . $wedding->partner->name;
                })
                ->addColumn('date', function (Wedding $wedding) {
                    return Carbon::parse($wedding->date)->isoFormat('D MMMM Y');
                })
                ->addColumn('action', function (Wedding $wedding) {
                    $btn = '<a href="weddings/detail/' . $wedding->id . '" class="dropdown-item detail"><i class="la la-info"></i> Info Detail</a>';
                    $btn .= '<button data-id="' . $wedding->id . '"  class="dropdown-item edit"><i class="feather icon-edit"></i> Sunting</button> ';
                    return '<button type="button" class="btn dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="la font-size-lg la-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                ' . $btn . '
                            </ul>';
                })
                ->rawColumns(['user', 'action'])
                ->make(true);
        }

        return view('admin.wedding.index', $data);
    }

    function detail(Request $request)
    {
        $data['title'] = 'Verifikasi Data Pendaftaran Nikah';
        $data['wedding'] = Wedding::where('id', $request->id)->where('status', 'complete')->first();

        return view('admin.wedding.detail', $data);
    }

    function store(Request $request)
    {
        $today = Carbon::now()->addDays(1);
        $request->validate([
            'married_date' => 'required|after:' . $today,
            'married_time' => 'required',
            'married_location_option' => 'required',
            'location' => ($request->married_location_option == 0) ? 'required' : '',
        ], [
            'married_date.required' => 'Pilih tanggal pelaksanaan pernikahanmu',
            'married_date.after' => 'Kami tidak dapat menerima pendaftaranmu pada tanggal ini',
            'married_time.required' => 'Pilih jam pelaksanaan pernikahanmu',
            'married_location_option.required' => 'Mohon berikan jawaban',
            'location.required' => 'Mohon berikan alamat lokasi pernikahan anda',
        ]);

        Wedding::updateOrCreate([
            'id' => $request->id,
        ], [
            'user_id' => $request->user_id,
            'date' => $request->married_date,
            'time' => $request->married_time,
            'married_on_office' => $request->married_location_option,
            'married_address' => empty($request->location) ? null : ucwords(strtolower($request->location)),
            'status' => 'complete',
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah diperbaharui',
        ]);
    }

    function report(Request $request)
    {
        $nmeng = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $nmind = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        if ($request->month && $request->year) {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', date('m', strtotime($request->month)))->whereYear('date', $request->year)->get();
            $data['month'] = str_ireplace($nmeng, $nmind, $request->month);
            $data['month_eng'] = $request->month;
            $data['year'] = $request->year;
        } else if ($request->month) {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', date('m', strtotime($request->month)))->whereYear('date', Carbon::now()->format('Y'))->get();
            $data['month'] = str_ireplace($nmeng, $nmind, $request->month);
            $data['month_eng'] = $request->month;
            $data['year'] = Carbon::now()->isoFormat('Y');
        } else if ($request->year) {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', $request->year)->get();
            $data['month'] = Carbon::now()->isoFormat('MMMM');
            $data['year'] = $request->year;
        } else {
            $data['weddings'] = Wedding::where('status', 'complete')->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->get();
            $data['month'] = Carbon::now()->isoFormat('MMMM');
            $data['year'] = Carbon::now()->isoFormat('Y');
        }

        $pdf = Pdf::loadView('admin.wedding.report', $data);
        return $pdf->setPaper('a4', 'landscape')->download(Str::random(5).'-'.$request->month.$request->year.'.pdf');

        // return view('admin.wedding.report', $data);
    }

    function check(Request $request)
    {
        $data = Wedding::findOrFail($request->id);

        return response()->json($data);
    }
}
