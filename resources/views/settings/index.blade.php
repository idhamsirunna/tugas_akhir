{{-- @dd($gelombang) --}}

@extends('layouts.dashboard')
@section('judul', 'Pengaturan Aplikasi')
@section('konten')
<a href="{{ route('settings.edit', ['setting'=>$gelombang->id_gelombang]) }}"
    class="btn btn-primary btn-block my-3">Ubah Pengaturan</a>
{{-- <div class="col-lg-10">
    #
</div> --}}
<div class="row">
    <div class="col-lg">
        <table class="table table-bordered" id="datatable">
            <tbody>
                <tr>
                    <td>Status Pendaftaran
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                            title="Status Penerimaan Siswa Saat Ini"></i>
                    </td>
                    {{-- <td><span data-toggle="tooltip" data-placement="right" title="Hooray!">Status Pendaftaran</span>
                    </td> --}}
                    @if ($gelombang->active === 1)
                    <td>Dibuka</td>
                    @else
                    <td>Ditutup</td>
                    @endif
                </tr>
                <tr>
                    <td>Gelombang Ke
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                            title="Gelombang Penerimaan Saat Ini"></i>
                    </td>
                    <td>{{ $gelombang->nama_gelombang }}</td>
                </tr>
                <tr>
                    <td>Tanggal Ujian
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                            title="Tanggal pelaksanaan ujian masuk pada gelombang saat ini"></i>
                    </td>
                    <td>{{ date("d F Y", strtotime($gelombang->tgl_ujian)) }}</td>
                </tr>
                <tr>
                    <td>Nama Bank</td>
                    <td>{{ $gelombang->nama_bank }}</td>
                </tr>
                <tr>
                    <td>No. Rekening</td>
                    <td>{{ $gelombang->no_rek }}</td>
                </tr>
                <tr>
                    <td>Nama Pemilik Rekening</td>
                    <td>{{ $gelombang->pemilik_rek }}</td>
                </tr>
                <tr>
                    <td>Contact Person SMP
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                            title="Masukkan nomor kontak Admin SMP yang bisa dihubungi."></i>
                    </td>
                    <td>{{ $gelombang->cp_smp }}</td>
                </tr>
                <tr>
                    <td>Contact Person SMA
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                            title="Masukkan nomor kontak Admin SMA yang bisa dihubungi."></i>
                    </td>
                    <td>{{ $gelombang->cp_sma }}</td>
                </tr>
                <tr>
                    <td>Contact Person SMK
                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                            title="Masukkan nomor kontak Admin SMK yang bisa dihubungi."></i>
                    </td>
                    <td>{{ $gelombang->cp_smk }}</td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td>{{ $gelombang->alamat_sekolah }}</td>
                </tr>
                <tr>
                    <td>No. Telp Sekolah</td>
                    <td>{{ $gelombang->telp_sekolah }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
