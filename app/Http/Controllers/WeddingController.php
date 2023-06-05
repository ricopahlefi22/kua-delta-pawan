<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WeddingController extends Controller
{
    function index(Request $request){
        $data['title'] = 'Data Pernikahan';

        if ($request->ajax()) {
            return DataTables::of(Wedding::where('status', 'complete')->get())
                ->addIndexColumn()
                ->addColumn('user', function (Wedding $wedding) {
                    return empty($wedding->partner->name) ? $wedding->user->name . ' & ?' : $wedding->user->name . ' & ' . $wedding->partner->name;
                })
                ->addColumn('action', function (Wedding $wedding) {
                    $btn = '<button data-id="' . $wedding->id . '" class="dropdown-item detail"><i class="la la-info"></i> Info Detail</button>';
                    $btn .= '<button data-id="' . $wedding->id . '"  class="dropdown-item edit"><i class="feather icon-edit"></i> Sunting</button> ';
                    return '<button type="button" class="btn dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="la font-size-lg la-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                '.$btn.'
                            </ul>';
                })
                ->rawColumns(['user', 'action'])
                ->make(true);
        }

        return view('admin.wedding.index', $data);
    }
}
