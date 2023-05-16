<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\User;
use App\Models\WebConfig;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeddingController extends Controller
{
    function index()
    {
        return view('user.form');
    }

    function starter()
    {
        $data['married_data'] = Wedding::where('user_id', Auth::user()->id)->first();
        // dd($data);
        return view('user.starter', $data);
    }

    function storeStarter(Request $request)
    {
        $request->validate([
            'married_date' => 'required',
            'married_time' => 'required',
            'married_location_option' => 'required',
            'location' => ($request->married_location_option == 0) ? 'required' : '',
        ], [
            'married_date.required' => 'Pilih tanggal pelaksanaan pernikahanmu',
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
            'married_address' => $request->location,
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah ditambahkan',
        ]);
    }

    function personal()
    {
        if (Wedding::where('user_id', Auth::user()->id)->first()) {
            $data['personal_data'] = User::where('id', Auth::user()->id)->first();
            return view('user.personal', $data);
        }

        return redirect('u/starter');
    }

    function storePersonal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_number' => 'required',
            'phone_number' => 'required',
            'birthplace' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'citizenship' => 'required',
            'status' => 'required',
            'employment' => 'required',
            'country' => ($request->citizenship == 'wna') ? 'required' : '',
        ], []);

        User::updateOrCreate([
            'id' => Auth::user()->id,
        ], [
            'name' => $request->name,
            'id_number' => $request->id_number,
            'phone_number' => $request->phone_number,
            'birthplace' => $request->birthplace,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'citizenship' => $request->citizenship,
            'status' => $request->status,
            'employment' => $request->employment,
            'country' => ($request->citizenship == 'wna') ? $request->country : null,
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah ditambahkan',
        ]);
    }

    function partner()
    {
        if (Wedding::where('user_id', Auth::user()->id)->first() && User::where('id', Auth::user()->id)->first()->gender != null) {
            $data['partner_data'] = Partner::where('user_id', Auth::user()->id)->first();

            return view('user.partner', $data);
        }

        return redirect('u/personal');
    }

    function storePartner(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_number' => 'required',
            'phone_number' => 'required',
            'birthplace' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'citizenship' => 'required',
            'status' => 'required',
            'employment' => 'required',
            'country' => ($request->citizenship == 'wna') ? 'required' : '',
        ], []);

        Partner::updateOrCreate([
            'id' => $request->id,
        ], [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'id_number' => $request->id_number,
            'phone_number' => $request->phone_number,
            'birthplace' => $request->birthplace,
            'birthday' => $request->birthday,
            'gender' => (Auth::user()->gender == 1) ? 2 : 1,
            'address' => $request->address,
            'citizenship' => $request->citizenship,
            'status' => $request->status,
            'employment' => $request->employment,
            'country' => ($request->citizenship == 'wna') ? $request->country : null,
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah ditambahkan',
        ]);
    }

    function requirements()
    {
        if (Wedding::where('user_id', Auth::user()->id)->first() && User::where('id', Auth::user()->id)->first()->gender != null && Partner::where('user_id', Auth::user()->id)->first()) {
            return view('user.requirements');
        }

        return redirect('u/partner');
    }
}
