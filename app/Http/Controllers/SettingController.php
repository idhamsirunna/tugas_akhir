<?php

namespace App\Http\Controllers;

use App\Gelombang;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gelombang = Gelombang::first();
        return view('settings.index', compact('gelombang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gelombang = Gelombang::first();
        return view('settings.edit', compact('gelombang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        Setting::where('id_gelombang', $id)
            ->update([
                'nama_bank' => $request->nama_bank,
                'no_rek' => $request->no_rek,
                'pemilik_rek' => $request->pemilik_rek,
                'cp_smp' => $request->cp_smp,
                'cp_sma' => $request->cp_sma,
                'cp_smk' => $request->cp_smk,
                'active' => $request->active,
                'alamat_sekolah' => $request->alamat_sekolah,
                'telp_sekolah' => $request->telp_sekolah,
                'nama_gelombang' => $request->nama_gelombang,
                'tgl_ujian' => $request->tgl_ujian,
            ]);
        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
