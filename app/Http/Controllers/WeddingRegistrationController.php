<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WeddingRegistrationController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Pendaftaran';

        if ($request->ajax()) {
            return DataTables::of(Wedding::where('status', 'progress')->get())
                ->addIndexColumn()
                ->addColumn('user', function (Wedding $wedding) {
                    return empty($wedding->partner->name) ? $wedding->user->name . ' & ?' : $wedding->user->name . ' & ' . $wedding->partner->name;
                })
                ->addColumn('action', function (Wedding $wedding) {
                    $btn = '';
                    if (!empty($wedding->requirement)) {
                        $btn .= '<a href="registrations/verification/' . $wedding->id . '" class="dropdown-item verification"><i class="la la-check"></i> Verifikasi</a>';
                    }
                    $btn .= '<button data-id="' . $wedding->id . '"  class="dropdown-item edit"><i class="feather icon-edit"></i> Sunting</button> ';
                    $btn .= '<button data-id="' . $wedding->id . '"  class="dropdown-item delete"><i class="feather icon-trash-2"></i> Hapus</button> ';
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

        return view('admin.registration.index', $data);
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
            'status' => 'progress',
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah diperbaharui',
        ]);
    }

    function verification(Request $request)
    {
        $data['title'] = 'Verifikasi Data Pendaftaran Nikah';
        $data['wedding'] = Wedding::where('id', $request->id)->where('status', 'progress')->first();

        if(empty($data['wedding'])){
            return redirect('registrations');
        }

        return view('admin.registration.verification', $data);
    }

    function verify(Request $request)
    {
        $data = Wedding::findOrFail($request->wedding_id);
        $data->status = 'complete';
        $data->update();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah diverifikasi.',
        ]);
    }

    function check(Request $request)
    {
        $data = Wedding::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = Wedding::findOrFail($request->id);

        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
