@extends('layouts.dashboard')
@section('judul', 'Dashboard')
@section('konten')
{{-- @dd(Auth::user()) --}}
<div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">Selamat datang di halaman registrasi, {{ Auth::user()->nama }}!</h5>
        <p class="card-text my-3">Silahkan melengkapi <a href="">data siswa</a>, <a href="">data orang tua</a>, dan <a
                href="">cetak
                kartu ujian</a> pada
            menu di samping
            kiri.</p>
        Jika mengalami kesulitan, silahkan unduh atau lihat cara menggunakan aplikasi ini <a target="_blank"
            href="https://alfidaacendikia.sch.id/wp-content/uploads/2019/11/Tutorial-PPDB-Online-SIT-Al-Fidaa-Cendikia.pdf"
            class="badge badge-primary">Disini</a>
    </div>
</div>

<h1 class="h4 my-2 text-gray-800">Informasi Akun</h1>
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-3">
            <img src="https://source.unsplash.com/QAB-WJcbgJk/" class="card-img" alt="...">
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title">{{ Auth::user()->nama }}</h5>
                <p class="card-text">{{ Auth::user()->email }}</p>
                <p class="card-text"><small class="text-muted">Tanggal
                        Pendaftaran: {{ Auth::user()->created_at->format('d M Y') }}</small></p>
            </div>
        </div>
    </div>
</div>
@endsection
