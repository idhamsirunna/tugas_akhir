@extends('layouts.dashboard')
@section('judul', 'Data Orang Tua / Wali')

@section('konten')
<a href="{{ route('orangtua.create') }}" class="btn btn-primary my-3">Lengkapi Data Orang Tua</a>

<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Ayah (Kandung/Wali)</th>
            <th scope="col">Ibu (Kandung/Wali)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Nama Lengkap</td>
            <td>{{ $orangtua->nama_ayah ?? '' }}</td>
            <td>{{ $orangtua->nama_ibu ?? '' }}</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Alamat Rumah</td>
            <td>{{ $orangtua->alamat_ayah ?? '' }}</td>
            <td>{{ $orangtua->alamat_ibu ?? '' }}</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Nomor Telepon</td>
            <td>{{ $orangtua->telp_ayah ?? '' }}</td>
            <td>{{ $orangtua->telp_ibu ?? '' }}</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Pendidikan Tertinggi</td>
            <td>{{ $orangtua->pendidikan_ayah ?? '' }}</td>
            <td>{{ $orangtua->pendidikan_ibu ?? '' }}</td>
        </tr>
        <tr>
            <th scope="row">5</th>
            <td>Pekerjaan</td>
            <td>{{ $orangtua->pekerjaan_ayah ?? '' }}</td>
            <td>{{ $orangtua->pekerjaan_ibu ?? '' }}</td>
        </tr>
        <tr>
            <th scope="row">6</th>
            <td>Penghasilan</td>
            <td>{{ $orangtua->penghasilan_ayah ?? '' }}</td>
            <td>{{ $orangtua->penghasilan_ibu ?? '' }}</td>
        </tr>
    </tbody>
</table>
@endsection
