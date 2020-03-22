<?php

namespace App\Http\Controllers;

use App\Detail_Siswa;
use App\Orangtua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orangtua = Orangtua::where('id_ortu', Auth::user()->id_user)->first();
        return view('orangtua.index', compact('orangtua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orangtua = Orangtua::where('id_ortu', Auth::user()->id_user)->first();
        return view('orangtua.create', compact('orangtua'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orangtua = Orangtua::where('id_ortu', Auth::user()->id_user)->first();
        // dd($orangtua);
        if ($orangtua) {
            $siswa = Orangtua::updateOrCreate(
                [
                    'id_ortu' => Auth::user()->id_user,
                ],
                [
                    'nama_ayah' => htmlspecialchars($request->nama_ayah),
                    'nama_ibu' => htmlspecialchars($request->nama_ibu),
                    'alamat_ayah' => htmlspecialchars($request->alamat_ayah),
                    'alamat_ibu' => htmlspecialchars($request->alamat_ibu),
                    'telp_ayah' => htmlspecialchars($request->telp_ayah),
                    'telp_ibu' => htmlspecialchars($request->telp_ibu),
                    'pendidikan_ayah' => htmlspecialchars($request->pendidikan_ayah),
                    'pendidikan_ibu' => htmlspecialchars($request->pendidikan_ibu),
                    'penghasilan_ayah' => htmlspecialchars($request->penghasilan_ayah),
                    'penghasilan_ibu' => htmlspecialchars($request->penghasilan_ibu),
                    'pekerjaan_ayah' => htmlspecialchars($request->pekerjaan_ayah),
                    'pekerjaan_ibu' => htmlspecialchars($request->pekerjaan_ibu)
                ]
            );
        } else {
            $siswa = Orangtua::firstOrCreate(
                [
                    'id_ortu' => Auth::user()->id_user,
                ],
                [
                    'id_ortu' => Auth::user()->id_user,
                    'nama_ayah' => htmlspecialchars($request->nama_ayah),
                    'nama_ibu' => htmlspecialchars($request->nama_ibu),
                    'alamat_ayah' => htmlspecialchars($request->alamat_ayah),
                    'alamat_ibu' => htmlspecialchars($request->alamat_ibu),
                    'telp_ayah' => htmlspecialchars($request->telp_ayah),
                    'telp_ibu' => htmlspecialchars($request->telp_ibu),
                    'pendidikan_ayah' => htmlspecialchars($request->pendidikan_ayah),
                    'pendidikan_ibu' => htmlspecialchars($request->pendidikan_ibu),
                    'penghasilan_ayah' => htmlspecialchars($request->penghasilan_ayah),
                    'penghasilan_ibu' => htmlspecialchars($request->penghasilan_ibu),
                    'pekerjaan_ayah' => htmlspecialchars($request->pekerjaan_ayah),
                    'pekerjaan_ibu' => htmlspecialchars($request->pekerjaan_ibu)
                ]
            );
            // dd(Auth::user()->id_user);
            // dd($request->all());
        }

        // $siswa =Orangtua::with('payment','payment.payment_detail')
    }
}
