@extends('layouts.app')
@section('judul', 'Login Calon Peserta')
@section('konten')
<div class="register-form">
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email Anda"
                value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control"
                placeholder="Masukkan Password Anda">
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-dark">Login!</button>
        <p style="clear: both" class="text-left">Belum Punya Akun? Daftar <a href="{{ route('register') }}"
                class="badge badge-dark">disini!</a></p>
        <p style="clear: both" class="text-center"><a href="{{ route('forgot') }}">Lupa Password?</a></p>
    </form>
</div>
@endsection
