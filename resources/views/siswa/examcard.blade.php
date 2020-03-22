{{-- @dd($ceksiswa) --}}
@extends('layouts.dashboard')

@section('judul', 'Cetak Kartu Ujian')

@section('konten')
@php $id = Auth::user()->id_user @endphp
<form action="{{ route('examcard.post', ['id'=>$id]) }}" method="post">
    @csrf
    <div class="container">
        <div class="alert alert-info" role="alert">
            Untuk Fotokopi Berkas Pendukung (KK, AKTE, IJAZAH, SKHUN, RAPORT KELAS 4,5,6 SD) (Masing-masing 1
            lembar) harap dibawa maksimal H-1 Sebelum ujian berlangsung, terima kasih.
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">Persyaratan Cetak Kartu Ujian</th>
                </tr>
                <tr>
                    <th class="text-center" scoxpe="col">Persyaratan</th>
                    <th class="text-center" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Membayar Biaya Pendaftaran/Formulir</td>
                    <td class="font-weight-bold">
                        @if ($ceksiswa->bayar_pendaftaran === 1) Sudah @else Belum @endif()
                    </td>
                </tr>
                <tr>
                    <td><a href="{{ route('biodata.index') }}">Mengisi Biodata Siswa</a></td>
                    <td class="font-weight-bold">
                        @if ($ceksiswa->detail_siswa) Sudah @else Belum @endif()
                    </td>
                </tr>
                <tr>
                    <td><a href="">Mengupload Pas Foto</a></td>
                    <td class="font-weight-bold">
                        @if ($ceksiswa->photo !== "default.jpg") Sudah @else Belum @endif()
                    </td>
                </tr>
                <tr>
                    <td><a href="">Mengisi Biodata Orangtua Siswa</a></td>
                    <td class="font-weight-bold">
                        @if ($ceksiswa->detail_siswa->orangtua) Sudah @else Belum @endif()
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-block mb-4"
            onclick="return confirm('Apakah ananda yakin ingin mencetak kartu? setelah kartu dicetak, ananda tidak dapat merubah data pendaftaran.')">Cetak!</button>
    </div>
</form>

@endsection
