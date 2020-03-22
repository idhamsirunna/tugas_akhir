@extends('layouts.dashboard')
@section('judul', 'Biodata Calon Siswa')
@section('konten')

@php
use App\Jenjang;
$role_id_get = Auth::user()->roles->pluck('id')->first();
// $role_id_get = 2;
$halo = Jenjang::with('jurusan')->where('id_jenjang', $role_id_get)->first();
// dd($halo->jurusan);

$cRole = Auth::user()->getRoleNames()->first();
if (stripos($cRole, "SMP") !== false) {
$asal = "SD";
} elseif(stripos($cRole, "SMA") !== false) {
$asal = "SMP";
}
elseif(stripos($cRole, "SMK") !== false) {
$asal = "SMP";
}
@endphp
<p>Harap Lengkapi Data Ananda Dibawah Ini Dan Klik Simpan.</p>
{{-- <div class="col-lg-10">
    #
</div> --}}
<div class="row mt-3">
    <div class="col-lg">
        <form action="{{ route('biodata.store') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <tbody>
                    @hasanyrole('SMA|SMK')
                    <tr>
                        <td>
                            Jurusan Yang Diminati
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Silahkan Pilih Jurusan Yang Diminati"></>
                        </td>
                        <td>
                            <select name="jurusan" id="jurusan" class="form-control">
                                <option value="-">---Masukkan Jurusan Yang Diminati---</option>
                                @foreach ($halo->jurusan as $item)
                                <option value="{{ $item->nama_jurusan }}">{{ $item->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @endrole
                    <tr>
                        <td>
                            NISN
                            <a href="https://nisn.data.kemdikbud.go.id/" target="_blank"><i
                                    class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                    title="Untuk melihat NISN bisa dilihat di Raport Siswa atau Melalui Link Berikut."></i></a>
                        </td>
                        <td>
                            <input type="text" name="nisn" value="{{ old('nisn') ?? $siswa->nisn ?? '' }}"
                                class="form-control" placeholder="Silahkan Masukkan NISN Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NIK
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right"
                                title="Nomor Induk Kependudukan bisa dilihat di Kartu Keluarga Calon Siswa yang bersangkutan."></i>
                        </td>
                        <td>
                            <input type="text" name="nik" value="{{ old('nik') ?? $siswa->nik ?? ''  }}"
                                class="form-control" placeholder="Silahkan Masukkan NIK Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap Calon Siswa</td>
                        <td>
                            <div class="form-control"> {{ Auth::user()->nama }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <select name="jenis_kel" class="form-control">
                                @if(!$siswa)
                                <option value="">Silahkan Pilih Jenis Kelamin</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                                @elseif ($siswa->jenis_kel == "L")
                                <option value="">Silahkan Pilih Jenis Kelamin</option>
                                <option value="L" selected>Laki - Laki</option>
                                <option value="P">Perempuan</option>
                                @elseif ($siswa->jenis_kel == "P")
                                <option value="">Silahkan Pilih Jenis Kelamin</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P" selected>Perempuan</option>

                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat & Tanggal Lahir</td>
                        <td>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir Calon Siswa"
                                        value="{{ $siswa->tempat_lahir ?? old('tempat_lahir') ?? '' }}">
                                </div>
                                <div class="col">
                                    <input type="text" name="tgl_lahir" id="datepicker" class="form-control"
                                        value="{{ $siswa->tgl_lahir ?? old('tgl_lahir') ?? '' }}"
                                        placeholder="Masukkan Tanggal Lahir Calon Siswa">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Rumah</td>
                        <td>
                            <input type="text" name="alamat_rumah"
                                value="{{ $siswa->alamat_rumah ?? old('alamat_rumah') ?? ''  }}" class="form-control"
                                placeholder="Silahkan Masukkan Alamat Rumah Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>
                            <div class="form-control"> {{ Auth::user()->no_telp }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>
                            <input type="text" name="agama" value="{{ $siswa->agama ?? old('agama') ?? ''  }}"
                                class="form-control" placeholder="Silahkan Masukkan Agama Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td>
                            <select name="kewarganegaraan" class="form-control">
                                @if (!$siswa)
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                                @elseif ($siswa->kewarganegaraan == "WNI")
                                <option value="WNI" selected>Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                                @elseif ($siswa->kewarganegaraan == "WNA")
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA" selected>Warga Negara Asing</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah ({{ $asal }})</td>
                        <td>
                            <input type="text" name="asal_sekolah"
                                value="{{ $siswa->asal_sekolah ?? old('asal_sekolah') ?? ''  }}" class="form-control"
                                placeholder="Silahkan Masukkan Nama Asal Sekolah Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>
                            <input type="text" name="alamat_sekolah"
                                value="{{ $siswa->alamat_sekolah ?? old('alamat_sekolah') ?? '' }}" class="form-control"
                                placeholder="Silahkan Masukkan Alamat Asal Sekolah Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>Bahasa Sehari-hari</td>
                        <td>
                            <input type="text" name="bahasa_rumah"
                                value="{{ $siswa->bahasa_rumah ?? old('bahasa_rumah') ?? '' }}" class="form-control"
                                placeholder="Silahkan Masukkan Bahasa Keseharian Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td>Anak-ke</td>
                        <td>
                            <div class="form-row align-items-center m-1">
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="anak_ke"
                                        placeholder="Ananda adalah anak ke..."
                                        value="{{ old('anak_ke') ?? $siswa->anak_ke ?? '' }}">
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">dari</div>
                                        </div>
                                        <input type="text" class="form-control" name="jumlah_saudara"
                                            placeholder="Masukkan Total Saudara Kandung"
                                            value="{{ old('jumlah_saudara') ?? $siswa->jumlah_saudara ?? '' }}">
                                    </div>
                                </div>
                                <div class=" col-sm-2">
                                    <label type="text" readonly class="form-control-plaintext text-left">
                                        bersaudara.
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Golongan Darah</td>
                        <td>
                            <input type="text" name="golongan_darah"
                                value="{{ $siswa->golongan_darah ?? old('golongan_darah') ?? '' }}" class="form-control"
                                placeholder="Silahkan Masukkan Golongan Darah Calon Siswa">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
