<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Pengguna';

        if ($request->ajax()) {
            return DataTables::of(User::all())
                ->addIndexColumn()
                ->addColumn('action', function (User $user) {
                    $btn = '<button title="Sunting Data" data-id="' . $user->id . '"  class="btn btn-sm btn-warning edit"><i class="feather icon-edit"></i></button> ';
                    $btn .= '<button title="Hapus Data" data-id="' . $user->id . '" class="btn btn-sm btn-danger delete"><i class="feather icon-trash-2"></i></button>';
                    return '<div class="btn-group">' . $btn . '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.user.index', $data);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => ($request->id) ? 'required|email' : 'required|email|unique:users',
            ],
            [
                'name.required' => 'Mohon isi kolom nama',
                'email.required' => 'Mohon isi kolom email',
                'email.email' => 'Format email tidak sesuai',
                'email.unique' => 'Email ini sudah terdaftar',
            ]
        );

        $photo = $request->hidden_photo;

        if ($request->file('photo')) {
            $path = 'public/user-photos';
            $file = $request->file('photo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $photo = "storage/user-photos/" . $file_name;
        }

        $data = User::updateOrCreate([
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
        $data = User::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = User::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
