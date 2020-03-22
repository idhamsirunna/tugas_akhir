{{-- @dd($gelombang) --}}

@extends('layouts.dashboard')
@section('judul', 'Pengaturan Aplikasi')
@section('konten')
{{-- <div class="col-lg-10">
    #
</div> --}}
<div class="row">
    <div class="col-lg">
        <form action="{{ route('settings.update', ['setting'=>1]) }}" method="post">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-primary btn-block my-3">Simpan</button>
            <table class="table table-bordered" id="datatable">
                <tbody>
                    <tr>
                        <td>Status Pendaftaran
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Status Penerimaan Siswa Saat Ini"></i>
                        </td>
                        {{-- <td><span data-toggle="tooltip" data-placement="right" title="Hooray!">Status Pendaftaran</span>
                    </td> --}}
                        <td>
                            <select class="form-control" name="active">
                                @if ($gelombang->active === 1)
                                <option value="1" selected>Dibuka</option>
                                <option value="2">Ditutup</option>
                                @else
                                <option value="1">Dibuka</option>
                                <option value="2" selected>Ditutup</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Gelombang Ke
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Gelombang Penerimaan Saat Ini"></i>
                        </td>
                        <td>
                            <input type="number" min="1" max="15" class="form-control"
                                placeholder="Masukkan Gelombang saat Ini" name="nama_gelombang"
                                value="{{ $gelombang->nama_gelombang }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Ujian
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Tanggal pelaksanaan ujian masuk pada gelombang saat ini"></i>
                        </td>
                        <td>
                            <input type="text" name="tgl_ujian" id="datepicker" class="form-control"
                                value="{{ $gelombang->tgl_ujian }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Bank</td>
                        <td>
                            <input type="text" name="nama_bank" class="form-control" name="nama_bank"
                                value="{{ $gelombang->nama_bank }}">
                        </td>
                    </tr>
                    <tr>
                        <td>No. Rekening</td>
                        <td>
                            <input type="text" name="no_rek" class="form-control" name="no_rek"
                                value="{{ $gelombang->no_rek }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Pemilik Rekening</td>
                        <td>
                            <input type="text" name="pemilik_rek" class="form-control" name="pemilik_rek"
                                value="{{ $gelombang->pemilik_rek }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Person SMP
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Masukkan nomor kontak Admin SMP yang bisa dihubungi."></i>
                        </td>
                        <td>
                            <input type="text" name="cp_smp" class="form-control" value="{{ $gelombang->cp_smp }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Person SMA
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Masukkan nomor kontak Admin SMA yang bisa dihubungi."></i>
                        </td>
                        <td>
                            <input type="text" name="cp_sma" class="form-control" value="{{ $gelombang->cp_sma }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Person SMK
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Masukkan nomor kontak Admin SMK yang bisa dihubungi."></i>
                        </td>
                        <td>
                            <input type="text" name="cp_smk" class="form-control" value="{{ $gelombang->cp_smk }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>
                            <input type="text" name="alamat_sekolah" class="form-control"
                                value="{{ $gelombang->alamat_sekolah }}">
                        </td>
                    </tr>
                    <tr>
                        <td>No. Telp Sekolah</td>
                        <td>
                            <input type="text" name="telp_sekolah" class="form-control"
                                value="{{ $gelombang->telp_sekolah }}">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection
