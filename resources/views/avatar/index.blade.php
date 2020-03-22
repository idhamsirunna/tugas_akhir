{{-- @dd($siswa) --}}
@extends('layouts.dashboard')
@section('judul', 'Biodata Calon Siswa')

@section('konten')
<h4>Upload Pas Foto Calon Siswa</h4>
<p>Silahkan Upload Pas Foto Calon Siswa berukuran 1x1 atau 4x6</p>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label"> Email
        </label>
        <div class="col-sm-10">
            <input type="text" name="email" id="email" class="form-control" value="{{ $siswa->email }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"> Nama Lengkap
        </label>
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control" value="{{ $siswa->nama }}" readonly>
            {{-- form error --}}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">Foto Profil</div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('assets') }}/images/profile/{{ $siswa->photo }}" alt="profile"
                        class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label for="image" class="custom-file-label">Pilih Gambar</label>
                        <small class="text-danger">*abaikan jika tidak ingin mengganti foto profil.</small>
                        <br>
                        <small class="text-danger">Maksimum File: 2MB. Format yang didukung: JPG, PNG, JPEG.</small>
                    </div>
                </div>
                <div class="mt-2 form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div> --}}
</form>
@endsection
