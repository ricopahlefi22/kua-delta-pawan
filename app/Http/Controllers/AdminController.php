<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Administrator';

        if ($request->ajax()) {
            return DataTables::of(Admin::all())
                ->addIndexColumn()
                ->addColumn('action', function (Admin $admin) {
                    $btn = '<button title="Sunting Data" data-id="' . $admin->id . '"  class="btn btn-sm btn-warning edit"><i class="feather icon-edit"></i></button> ';
                    $btn .= '<button title="Hapus Data" data-id="' . $admin->id . '" class="btn btn-sm btn-danger delete"><i class="feather icon-trash-2"></i></button>';
                    return '<div class="btn-group">' . $btn . '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.administrator.index', $data);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => ($request->id) ? 'required|email' : 'required|email|unique:admins',
            ],
            [
                'name.required' => 'Mohon isi kolom nama',
                'email.required' => 'Mohon isi kolom email',
                'email.email' => 'Format email tidak benar',
                'email.unique' => 'Email ini sudah terdaftar',
            ]
        );

        $photo = $request->hidden_photo;

        if ($request->file('photo')) {
            $path = 'public/admin-photos';
            $file = $request->file('photo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $photo = "storage/admin-photos/" . $file_name;
        }

        $data = Admin::updateOrCreate([
            'id' => $request->id,
        ], [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('12341234'),
            'photo' => $photo,
        ]);

        if ($request->id != $data->id) {
            return response()->json([
                'code' => 200,
                'status' => 'Berhasil!',
                'message' => 'Data telah ditambahkan',
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'status' => 'Berhasil!',
                'message' => 'Data telah diperbaharui.',
            ]);
        }
    }

    function check(Request $request)
    {
        $data = Admin::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = Admin::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
