@extends('layouts.dashboard')
@section('judul', 'Biodata Calon Siswa')
@section('konten')
@if (Auth::user()->sudah_cetak === 0)
<a href="{{ route('biodata.create') }}" class="btn btn-primary mb-4">Lengkapi Data Siswa</a>
<a href="#" class="btn btn-primary mb-4">Upload Pas Foto 4x6</a>
@endif
@php
$cRole = Auth::user()->getRoleNames()[0];
if (stripos($cRole, "SMP") !== false) {
$asal = "SD";
} elseif(stripos($cRole, "SMA") !== false) {
$asal = "SMP";
}
elseif(stripos($cRole, "SMK") !== false) {
$asal = "SMP";
}
@endphp
{{-- <div class="col-lg-10">
    #
</div> --}}
<div class="row">
    <div class="col-lg">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td>Pas Foto (Opsional)</td>
                    <td>
                        <img class="img-profile img-thumbnail" style="width: 100px;" src="#">
                    </td>
                </tr>
                <tr>
                    <td>No. Pendaftaran</td>
                    <td>{{ $siswa->no_daftar ?? '' }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>{{ $siswa->nisn ?? '' }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $siswa->nik ?? '' }}</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>{{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    @if ($siswa->jenis_kel ?? '')
                    @if ($siswa->jenis_kel === "L")
                    <td>Laki - Laki</td>
                    @else
                    <td>Perempuan</td>
                    @endif
                    @else
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <td>Tempat & Tanggal Lahir</td>
                    @if ($siswa->tempat_lahir ?? '')
                    <td>{{ $siswa->tempat_lahir }}, {{ date('d M Y', strtotime($siswa->tgl_lahir))}}</td>
                    @else
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <td>Alamat Rumah</td>
                    <td>{{ $siswa->alamat_rumah ?? '' }}</td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>{{ Auth::user()->no_telp }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>{{ $siswa->agama ?? '' }}</td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>{{ $siswa->kewarganegaraan ?? '' }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah ({{ $asal }})</td>
                    <td>{{ $siswa->asal_sekolah ?? '' }}</td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td>{{ $siswa->alamat_sekolah ?? '' }}</td>
                </tr>
                <tr>
                    <td>Bahasa Sehari-hari</td>
                    <td>{{ $siswa->bahasa_rumah ?? '' }}</td>
                </tr>
                <tr>
                    <td>Anak-ke</td>
                    <td>{{ $siswa->anak_ke  ?? '-' }} dari {{ $siswa->jumlah_saudara ?? '-' }} bersaudara</td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>{{ $siswa->golongan_darah ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
