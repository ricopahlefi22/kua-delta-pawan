<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function profileUser(){
        return view('user.profile');
    }

    function profileAdmin(){
        $data['title'] = 'Profil';
        return view('admin.profile', $data);
    }

    function createPassword(Request $request){
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'kolom password belum diisi',
            'password.min' => 'password minimal 8 karakter',
            'password_confirmation.required' => 'anda belum isi konfirmasi pasword',
            'password_confirmation.same' => 'konfirmasi password tidak sesuai',
        ]);

        $data = User::findOrFail(Auth::user()->id);
        $data->password = bcrypt($request->password);
        $data->save();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Passwordmu berhasil dibuat!.',
        ]);
    }

    function changePassword(Request $request){
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'kolom password belum diisi',
            'password.min' => 'password minimal 8 karakter',
            'password_confirmation.required' => 'anda belum isi konfirmasi pasword',
            'password_confirmation.same' => 'konfirmasi password tidak sesuai',
        ]);

        $data = User::findOrFail(Auth::user()->id);
        $data->password = bcrypt($request->password);
        $data->update();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Passwordmu berhasil diganti!.',
        ]);
    }

    function createPasswordAdmin(Request $request){
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'kolom password belum diisi',
            'password.min' => 'password minimal 8 karakter',
            'password_confirmation.required' => 'anda belum isi konfirmasi pasword',
            'password_confirmation.same' => 'konfirmasi password tidak sesuai',
        ]);

        $data = Admin::findOrFail(Auth::user()->id);
        $data->password = bcrypt($request->password);
        $data->save();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Passwordmu berhasil dibuat!.',
        ]);
    }

    function changePasswordAdmin(Request $request){
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'kolom password belum diisi',
            'password.min' => 'password minimal 8 karakter',
            'password_confirmation.required' => 'anda belum isi konfirmasi pasword',
            'password_confirmation.same' => 'konfirmasi password tidak sesuai',
        ]);

        $data = Admin::findOrFail(Auth::user()->id);
        $data->password = bcrypt($request->password);
        $data->update();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Passwordmu berhasil diganti!.',
        ]);
    }
}
