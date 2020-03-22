<?php

namespace App\Http\Controllers;

use App\Detail_Siswa;
use App\Orangtua;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role_name = Auth::user()->getRoleNames();
        // dd($role_name);
        if ($role_name[0] != "Super Admin" || $role_name[0] != "Admin") {
            // Role SMP SMA SMK
            return view('siswa.index');
        } else {
            // Role Admin
            return view('admin.index');
        }
        // dd(Auth::user());
    }

    public function payment()
    {
        if (Auth::user()->bayar_pendaftaran === 1) {
            return redirect(route('home'));
        } else {
            return view('auth.payment');
        }
    }

    public function examcard()
    {
        // return 'ok this is exam card section';
        $cek_siswa = Detail_Siswa::where('id_siswa', Auth::user()->id_user)->count();
        $cek_ortu = Orangtua::where('id_ortu', Auth::user()->id_user)->count();
        if ($cek_siswa > 0) {
            $cekSiswa = "Sudah";
        } else {
            $cekSiswa = "Belum";
        }

        if ($cek_ortu > 0) {
            $cekOrtu = "Sudah";
        } else {
            $cekOrtu = "Belum";
        }
        dd($cekSiswa, $cekOrtu);

        return view('siswa.examcard', compact('cekSiswa', 'cekOrtu'));
    }

    public function examcardPost(Request $request)
    {
        return $request;
    }

    public function information()
    {
        return 'ok this is information section';
    }

    public function biaya()
    {
        return 'ok this is biaya section';
    }
}
