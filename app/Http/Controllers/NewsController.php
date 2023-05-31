<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Berita';

        if ($request->ajax()) {
            return DataTables::of(News::all())
                ->addIndexColumn()
                ->addColumn('action', function (News $recepient) {
                    $btn = '<button title="Sunting Data" data-id="' . $recepient->id . '"  class="btn btn-sm btn-warning edit"><i class="feather icon-edit"></i></button> ';
                    $btn .= '<button title="Hapus Data" data-id="' . $recepient->id . '" class="btn btn-sm btn-danger delete"><i class="feather icon-trash-2"></i></button>';
                    return '<div class="btn-group">' . $btn . '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.news.index', $data);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'title' => ($request->id) ? 'required' : 'required|unique:news',
                'body' => 'required',
            ],
            [
                'title.required' => 'Mohon isi kolom judul berita',
                'title.unique' => 'Judul ini sudah pernah ada',
                'body.required' => 'Mohon isi kolom isi berita',
            ]
        );

        $image = $request->hidden_image;

        if ($request->file('image')) {
            $path = 'public/news-images';
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $image = "storage/news-images/" . $file_name;
        }

        $data = News::updateOrCreate([
            'id' => $request->id,
        ], [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $image,
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
        $data = News::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = News::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
