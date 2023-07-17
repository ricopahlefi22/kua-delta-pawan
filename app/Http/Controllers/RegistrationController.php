<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Requirement;
use App\Models\User;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    function index()
    {
        return view('user.form');
    }

    function starter()
    {
        $data['married_data'] = Wedding::where('user_id', Auth::user()->id)->first();

        return view('user.starter', $data);
    }

    function storeStarter(Request $request)
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
            'user_id' => Auth::user()->id,
            'date' => $request->married_date,
            'time' => $request->married_time,
            'married_on_office' => $request->married_location_option,
            'married_address' => empty($request->location) ? null : ucwords(strtolower($request->location)),
            'status' => 'progress',
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
            'country' => ($request->citizenship == 'WNA') ? 'required' : '',
            // 'photo' => empty($request->hidden_photo)  ? 'required' : '',
            'ktp' => empty($request->hidden_ktp)  ? 'required' : '',
        ], [
            'name.required' => 'Mohon isi kolom nama',
            'id_number.required' => 'Mohon isi kolom nik',
            'phone_number.required' => 'Mohon isi kolom nomor handphone',
            'birthplace.required' => 'Mohon isi kolom tempat lahir',
            'birthday.required' => 'Mohon isi kolom tanggal lahir',
            'gender.required' => 'Mohon Pilih',
            'address.required' => 'Mohon isi kolom alamat',
            'citizenship.required' => 'Mohon Pilih',
            'status.required' => 'Mohon Pilih',
            'employment.required' => 'Mohon isi kolom pekerjaan',
            'country.required' => 'Mohon isi kolom negara',
            'photo.required' => 'Mohon unggah pas foto',
            'ktp.required' => 'Mohon unggah foto ktp',
        ]);

        $photo = $request->hidden_photo;

        if ($request->file('photo')) {
            $path = 'public/user-photos';
            $file = $request->file('photo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $photo = "storage/user-photos/" . $file_name;
        }

        $ktp = $request->hidden_ktp;

        if ($request->file('ktp')) {
            $path = 'public/user-ktp';
            $file = $request->file('ktp');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $ktp = "storage/user-ktp/" . $file_name;
        }

        User::updateOrCreate([
            'id' => Auth::user()->id,
        ], [
            'name' => ucwords(strtolower($request->name)),
            'id_number' => str_replace(' ', '', $request->id_number),
            'phone_number' => $request->phone_number,
            'birthplace' => ucwords(strtolower($request->birthplace)),
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'citizenship' => $request->citizenship,
            'status' => $request->status,
            'parent_status' => $request->parent_status,
            'employment' => $request->employment,
            'country' => ($request->citizenship == 'WNA') ? ucwords(strtolower($request->country)) : null,
            'photo' => $photo,
            'ktp' => $ktp,
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
            'country' => ($request->citizenship == 'WNA') ? 'required' : '',
            // 'photo' => empty($request->hidden_photo)  ? 'required' : '',
            'ktp' => empty($request->hidden_ktp)  ? 'required' : '',
        ], [
            'name.required' => 'Mohon isi kolom nama',
            'id_number.required' => 'Mohon isi kolom nik',
            'phone_number.required' => 'Mohon isi kolom nomor handphone',
            'birthplace.required' => 'Mohon isi kolom tempat lahir',
            'birthday.required' => 'Mohon isi kolom tanggal lahir',
            'address.required' => 'Mohon isi kolom alamat',
            'citizenship.required' => 'Mohon Pilih',
            'status.required' => 'Mohon Pilih',
            'employment.required' => 'Mohon isi kolom pekerjaan',
            'country.required' => 'Mohon isi kolom negara',
            'photo.required' => 'Mohon unggah pas foto',
            'ktp.required' => 'Mohon unggah foto ktp',
        ]);

        $photo = $request->hidden_photo;

        if ($request->file('photo')) {
            $path = 'public/partner-photos';
            $file = $request->file('photo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $photo = "storage/partner-photos/" . $file_name;
        }

        $ktp = $request->hidden_ktp;

        if ($request->file('ktp')) {
            $path = 'public/partner-ktp';
            $file = $request->file('ktp');
            $file_name = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $ktp = "storage/partner-ktp/" . $file_name;
        }

        $partner = Partner::updateOrCreate([
            'id' => $request->id,
        ], [
            'user_id' => Auth::user()->id,
            'wedding_id' => Wedding::where('user_id', Auth::user()->id)->first()->id,
            'name' => ucwords(strtolower($request->name)),
            'id_number' => str_replace(' ', '', $request->id_number),
            'phone_number' => $request->phone_number,
            'birthplace' => ucwords(strtolower($request->birthplace)),
            'birthday' => $request->birthday,
            'gender' => (Auth::user()->gender == 'Laki-Laki') ? 'Perempuan' : 'Laki-Laki',
            'address' => $request->address,
            'citizenship' => $request->citizenship,
            'status' => $request->status,
            'parent_status' => $request->parent_status,
            'employment' => $request->employment,
            'country' => ($request->citizenship == 'WNA') ? ucwords(strtolower($request->country)) : null,
            'photo' => $photo,
            'ktp' => $ktp,
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
            $data['user'] = User::findOrFail(Auth::user()->id);
            $data['partner'] = Partner::where('user_id', Auth::user()->id)->first();
            $data['wedding'] = Wedding::where('user_id', Auth::user()->id)->first();
            $data['req_data'] = Requirement::where('user_id', Auth::user()->id)->first();

            return view('user.requirements', $data);
        }

        return redirect('u/partner');
    }

    function storeRequirements(Request $request)
    {
        $n1 = $request->hidden_n1;

        if ($request->file('n1')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('n1');
            $file_name = 'n1-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $n1 = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $n2 = $request->hidden_n2;

        if ($request->file('n2')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('n2');
            $file_name = 'n2-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $n2 = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $n3 = $request->hidden_n3;

        if ($request->file('n3')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('n3');
            $file_name = 'n3-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $n3 = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $n4 = $request->hidden_n4;

        if ($request->file('n4')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('n4');
            $file_name = 'n4-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $n4 = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $n5 = $request->hidden_n5;

        if ($request->file('n5')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('n5');
            $file_name = 'n5-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $n5 = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $n7 = $request->hidden_n7;

        if ($request->file('n7')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('n7');
            $file_name = 'n7-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $n7 = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $buktiPembayaran = $request->hidden_bukti_pembayaran;

        if ($request->file('bukti_pembayaran')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('bukti_pembayaran');
            $file_name = 'bukti-pembayaran-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $buktiPembayaran = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $suratDespensasi = $request->hidden_surat_despensasi;

        if ($request->file('surat_despensasi')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('surat_despensasi');
            $file_name = 'surat-despensasi-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $suratDespensasi = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $uKK = $request->hidden_u_kk;

        if ($request->file('u_kk')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('u_kk');
            $file_name = 'uKK-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $uKK = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $uSuratKesehatan = $request->hidden_u_surat_kesehatan;

        if ($request->file('u_surat_kesehatan')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('u_surat_kesehatan');
            $file_name = 'uSuratKesehatan-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $uSuratKesehatan = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $uSuratIzinKomandan = $request->hidden_u_surat_izin_komandan;

        if ($request->file('u_surat_izin_komandan')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('u_surat_izin_komandan');
            $file_name = 'uSuratIzinKomandan-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $uSuratIzinKomandan = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $uAktaCeraiKematian = $request->hidden_u_akta_cerai_kematian;

        if ($request->file('u_akta_cerai_kematian')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('u_akta_cerai_kematian');
            $file_name = 'uAktaCeraiKematian-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $uAktaCeraiKematian = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $uSuratIzinKedutaan = $request->hidden_u_surat_izin_kedutaan;

        if ($request->file('u_surat_izin_kedutaan')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('u_surat_izin_kedutaan');
            $file_name = 'uSuratIzinKedutaan-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $uSuratIzinKedutaan = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $uPaspor = $request->hidden_u_paspor;

        if ($request->file('u_paspor')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('u_paspor');
            $file_name = 'uPaspor-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $uPaspor = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $pKK = $request->hidden_p_kk;

        if ($request->file('p_kk')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('p_kk');
            $file_name = 'uKK-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $pKK = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $pSuratKesehatan = $request->hidden_p_surat_kesehatan;

        if ($request->file('p_surat_kesehatan')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('p_surat_kesehatan');
            $file_name = 'uSuratKesehatan-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $pSuratKesehatan = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $pSuratIzinKomandan = $request->hidden_p_surat_izin_komandan;

        if ($request->file('p_surat_izin_komandan')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('p_surat_izin_komandan');
            $file_name = 'uSuratIzinKomandan-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $pSuratIzinKomandan = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $pAktaCeraiKematian = $request->hidden_p_akta_cerai_kematian;

        if ($request->file('p_akta_cerai_kematian')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('p_akta_cerai_kematian');
            $file_name = 'uAktaCeraiKematian-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $pAktaCeraiKematian = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $pSuratIzinKedutaan = $request->hidden_p_surat_izin_kedutaan;

        if ($request->file('p_surat_izin_kedutaan')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('p_surat_izin_kedutaan');
            $file_name = 'uSuratIzinKedutaan-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $pSuratIzinKedutaan = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        $pPaspor = $request->hidden_p_paspor;

        if ($request->file('p_paspor')) {
            $path = 'public/requirements/' . Auth::user()->id;
            $file = $request->file('p_paspor');
            $file_name = 'uPaspor-'.time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $pPaspor = "storage/requirements/" . Auth::user()->id . "/" . $file_name;
        }

        Requirement::updateOrCreate([
            'id' => $request->id,
        ], [
            'user_id' => Auth::user()->id,
            'wedding_id' => Wedding::where('user_id', Auth::user()->id)->first()->id,
            'n1' => $n1,
            'n2' => $n2,
            'n3' => $n3,
            'n4' => $n4,
            'n5' => $n5,
            'n7' => $n7,
            'bukti_pembayaran' => $buktiPembayaran,
            'surat_despensasi' => $suratDespensasi,

            'u_kk' => $uKK,
            'u_surat_kesehatan' => $uSuratKesehatan,
            'u_surat_izin_komandan' => $uSuratIzinKomandan,
            'u_akta_cerai_kematian' => $uAktaCeraiKematian,
            'u_surat_izin_kedutaan' => $uSuratIzinKedutaan,
            'u_paspor' => $uPaspor,

            'p_kk' => $pKK,
            'p_surat_kesehatan' => $pSuratKesehatan,
            'p_surat_izin_komandan' => $pSuratIzinKomandan,
            'p_akta_cerai_kematian' => $pAktaCeraiKematian,
            'p_surat_izin_kedutaan' => $pSuratIzinKedutaan,
            'p_paspor' => $pPaspor,
        ]);

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Mantap',
        ]);
    }
}
