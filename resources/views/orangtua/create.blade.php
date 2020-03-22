@extends('layouts.dashboard')
@section('judul', 'Data Orang Tua / Wali')

@section('konten')
<p>Harap Lengkapi Data Orang Tua Dengan Sebenar-benarnya.</p>

<form action="{{ route('orangtua.store') }}" method="post">
    @csrf
    <table class="table table-bordered text-center">
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
                <td>
                    <input type="text" name="nama_ayah" class="form-control"
                        value="{{ $orangtua->nama_ayah ?? old('nama_ayah') }}">
                </td>
                <td>
                    <input type=" text" name="nama_ibu" class="form-control"
                        value="{{ $orangtua->nama_ibu ?? old('nama_ibu') }}">
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Alamat Rumah</td>
                <td>
                    <input type="text" name="alamat_ayah" class="form-control"
                        value="{{ $orangtua->alamat_ayah ?? old('alamat_ayah') }}">
                </td>
                <td>
                    <input type="text" name="alamat_ibu" class="form-control"
                        value="{{ $orangtua->alamat_ibu ?? old('alamat_ibu') }}">
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Nomor Telepon</td>
                <td>
                    <input type="text" name="telp_ayah" class="form-control"
                        value="{{ $orangtua->telp_ayah ?? old('telp_ayah') }}">
                </td>
                <td>
                    <input type="text" name="telp_ibu" class="form-control"
                        value="{{ $orangtua->telp_ibu ?? old('telp_ibu') }}">
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Pendidikan Tertinggi</td>
                <td>
                    <input type="text" name="pendidikan_ayah" class="form-control"
                        value="{{ $orangtua->pendidikan_ayah ?? old('pendidikan_ayah') }}">
                </td>
                <td>
                    <input type="text" name="pendidikan_ibu" class="form-control"
                        value="{{ $orangtua->pendidikan_ibu ?? old('pendidikan_ibu') }}">
                </td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Pekerjaan</td>
                <td>
                    <input type="text" name="pekerjaan_ayah" class="form-control"
                        value="{{ $orangtua->pekerjaan_ayah ?? old('pekerjaan_ayah') }}">
                </td>
                <td>
                    <input type="text" name="pekerjaan_ibu" class="form-control"
                        value="{{ $orangtua->pekerjaan_ibu ?? old('pekerjaan_ibu') }}">
                </td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Penghasilan</td>
                <td>
                    <input type="text" name="penghasilan_ayah" class="form-control"
                        value="{{ $orangtua->penghasilan_ayah ?? old('penghasilan_ayah') }}" id="rupiah"
                        data-a-sign="Rp. " data-a-dec="," data-a-sep=".">
                </td>
                <td>
                    <input type="text" name="penghasilan_ibu" class="form-control"
                        value="{{ $orangtua->penghasilan_ibu ?? old('penghasilan_ibu') }}" id="uang" data-a-sign="Rp. "
                        data-a-dec="," data-a-sep=".">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>

@endsection

@section('js')
<script>
    var a8390d=['autoNumeric','init','ready'];(function(eiu0da,a8390D){var eIu0da=function(A8390D){while(--A8390D){eiu0da['push'](eiu0da['shift']());}};eIu0da(++a8390D);}(a8390d,0x1e0));var eiu0da=function(A8390d,Eiu0da){A8390d=A8390d-0x0;var a8390D=a8390d[A8390d];return a8390D;};$(document)[eiu0da('0x2')](function(){$('#rupiah')[eiu0da('0x0')](eiu0da('0x1'));});
</script>
<script>
    var h89ef=['init','autoNumeric','ready'];(function(nc98,nC98){var h89Ef=function(H89Ef){while(--H89Ef){nc98['push'](nc98['shift']());}};h89Ef(++nC98);}(h89ef,0xf6));var nc98=function(Nc98,H89ef){Nc98=Nc98-0x0;var nC98=h89ef[Nc98];return nC98;};$(document)[nc98('0x2')](function(){$('#uang')[nc98('0x1')](nc98('0x0'));});
</script>
@endsection
