@extends('layouts.app')
{{-- @dd($role) --}}
@section('judul', 'Pendaftaran Calon Peserta Didik')
@section('konten')
<div class="register-form">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" form-group">
            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Masukkan e-mail yang valid" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                placeholder="Masukkan Nomor Telpon Calon Siswa" value="{{ old('no_telp') }}">
            @error('no_telp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-md-6 mb-3 mb-md-0">
                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                    id="password" name="password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control form-control-user @error('password1') is-invalid @enderror"
                    id="password1" name="password1" placeholder="Konfirmasi Password">
            </div>
        </div>
        <div class="form-group">
            <select name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                <option value="">Saya Ingin Mendaftar Ke</option>
                @foreach ($role as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('pendidikan')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-dark float-right">Daftar!</button>
        <p style="clear: both" class="text-left">Sudah Punya Akun? Masuk <a href="{{ route('login') }}"
                class="badge badge-dark">disini!</a></p>
        <p style="clear: both" class="text-center"><a href="{{ route('forgot') }}">Lupa Password?</a></p>
    </form>
</div>
@endsection
