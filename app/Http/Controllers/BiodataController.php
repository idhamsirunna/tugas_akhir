<?php

namespace App\Http\Controllers;

use App\Detail_Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Detail_Siswa::where('id_user', Auth::user()->id_user)->first();
        return view('biodata.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jenis_kelamin = [
        //     "L" => "Laki-Laki",
        //     "P" => "Perempuan",
        // ];
        // $selectedID = "L";
        // dd($jenis_kelamin);
        $siswa = Detail_Siswa::where('id_user', Auth::user()->id_user)->first();
        return view('biodata.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // START NOMOR OTOMATIS
        $id = Auth::user()->roles->pluck('id')->first();
        $tempUser = Auth::user()->id_user;
        $AWAL = "0" . $id . ".";
        $noUrutAkhir = Detail_Siswa::where('no_daftar', $AWAL)->max('id_siswa');
        $no = 1;
        if ($noUrutAkhir) {
            $test = "$AWAL" . sprintf("%03s", abs($noUrutAkhir + 1));
        } else {
            $test = "$AWAL" . sprintf("%03s", $no);
        }
        // END NOMOR OTOMATIS

        // START VALIDASI JURUSAN
        if ($id === 1) {
            $jurusan = "-";
        } else {
            $jurusan = htmlspecialchars($request->jurusan);
        }
        // END VALIDASI JURUSAN

        $cekSiswa = Detail_Siswa::where('id_user', $tempUser)->first();
        if ($cekSiswa) {
            // Kalau data siswanya ada
            $siswa = Detail_Siswa::updateOrCreate(
                [
                    'id_user' => $tempUser,
                ],
                [
                    'id_siswa' => $tempUser,
                    'id_ortu' => $tempUser,
                    'nisn' => htmlspecialchars($request->nisn),
                    'nik' => htmlspecialchars($request->nik),
                    'jenis_kel' => htmlspecialchars($request->jenis_kel),
                    'tempat_lahir' => htmlspecialchars($request->tempat_lahir),
                    'tgl_lahir' => htmlspecialchars($request->tgl_lahir),
                    'alamat_rumah' => htmlspecialchars($request->alamat_rumah),
                    'agama' => htmlspecialchars($request->agama),
                    'kewarganegaraan' => htmlspecialchars($request->kewarganegaraan),
                    'asal_sekolah' => htmlspecialchars($request->asal_sekolah),
                    'alamat_sekolah' => htmlspecialchars($request->alamat_sekolah),
                    'bahasa_rumah' => htmlspecialchars($request->bahasa_rumah),
                    'anak_ke' => htmlspecialchars($request->anak_ke),
                    'jumlah_saudara' => htmlspecialchars($request->jumlah_saudara),
                    'golongan_darah' => htmlspecialchars($request->golongan_darah),
                    'jurusan' => $jurusan,
                ]
            );
        } else {
            $siswa = Detail_Siswa::firstOrCreate(
                [
                    'id_user' => $tempUser,
                ],
                [
                    'id_siswa' => $tempUser,
                    'id_ortu' => $tempUser,
                    'no_daftar' => htmlspecialchars($test),
                    'nisn' => htmlspecialchars($request->nisn),
                    'nik' => htmlspecialchars($request->nik),
                    'jenis_kel' => htmlspecialchars($request->jenis_kel),
                    'tempat_lahir' => htmlspecialchars($request->tempat_lahir),
                    'tgl_lahir' => htmlspecialchars($request->tgl_lahir),
                    'alamat_rumah' => htmlspecialchars($request->alamat_rumah),
                    'agama' => htmlspecialchars($request->agama),
                    'kewarganegaraan' => htmlspecialchars($request->kewarganegaraan),
                    'asal_sekolah' => htmlspecialchars($request->asal_sekolah),
                    'alamat_sekolah' => htmlspecialchars($request->alamat_sekolah),
                    'bahasa_rumah' => htmlspecialchars($request->bahasa_rumah),
                    'anak_ke' => htmlspecialchars($request->anak_ke),
                    'jumlah_saudara' => htmlspecialchars($request->jumlah_saudara),
                    'golongan_darah' => htmlspecialchars($request->golongan_darah),
                    'jurusan' => $jurusan,
                ]
            );
            // dd(Auth::user()->id_user);
            // dd($request->all());
        }
    }

    public function foto()
    {
        //
    }
}
