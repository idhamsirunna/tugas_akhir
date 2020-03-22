@php
use App\Setting;
$role = Auth::user()->getRoleNames()->first();
$settings = Setting::first();
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerimaan Peserta Didik Baru Yayasan Al Fidaa</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        li {
            margin-bottom: 5px;
        }

        body {
            font-size: 14pt;
        }

        th {
            color: green;
        }

        h2 {
            color: black;
        }
    </style>

</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Informasi Biaya Pendaftaran</h1>
        <p class="text-center">Terima kasih telah mendaftar di Yayasan Al Fidaa Cendikia Unit {{ $role }}</p>
        <ol>

            <li>
                Sebelum dapat mengisi biodata calon siswa, silahkan membayar biaya pendaftaran melalui transfer ke
                Rekening <b>Bank {{ $settings->nama_bank }}</b> dengan rincian:<br />
                <div class="row">
                    <div class="col-sm-6">
                        <table>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>:</td>
                                <th>{{ $settings->no_rek }}</th>
                            </tr>
                            <tr>
                                <td>Nama Pemilik Rekening</td>
                                <td>:</td>
                                <th>{{ $settings->pemilik_rek }}</th>
                            </tr>
                            <tr>
                                <td>Biaya Formulir Pendaftaran</td>
                                <td>:</td>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </li>
            <li>
                Setelah melakukan pembayaran, Calon siswa/Orang tua dapat melakukan konfirmasi pembayaran dengan
                mengirimkan bukti transfer <a target="_blank" @if($role==="SMP" ) href="SMP NIH" @elseif($role==="SMA" )
                    href="SMA NIH" @elseif($role==="SMK" ) href="SMK NIH" @endif class="btn text-white"
                    style="background-color: purple;">disini</a> dan menunggu validasi admin maksimal selama 1x12 jam.
            </li>
            <li>
                Proses konfirmasi pembayaran dilakukan pada setiap hari pada jam 08.00 – 16.00 WIB, kemudian calon siswa
                akan menerima konfirmasi pembayaran melalui Nomor HP yang digunakan untuk konfirmasi.
            </li>
            <li>
                Setelah dikonfirmasi, silahkan login ke alamat <a
                    href="{{ route('payment') }}">http://alfidaacendikia.sch.id/ppdb/</a>
                menggunakan e-mail dan sandi yang
                sudah didaftarkan sebelumnya untuk melengkapi biodata, upload pas foto, dan mencetak kartu ujian.
            </li>
            <li>
                Informasi akun untuk masuk ke dalam aplikasi sebelumnya telah dikirim ke alamat email
                {{ Auth::user()->email }}. Jika di kotak masuk tidak ada, periksa di folder Junk/Spam.
            </li>
            <li>Jika mengalami kendala dalam pengisian data, penggunaan aplikasi, maupun lupa sandi, bisa datang
                langsung ke Yayasan Al Fidaa Cendikia atau hubungi Admin di @if($role==="SMP") {{ $settings->cp_smp }}
                @elseif($role==="SMA") {{ $settings->cp_sma }} @elseif($role==="SMK") {{ $settings->cp_smk }} @endif
            </li>
        </ol>
        <a href="{{ route('login') }}" class="btn btn-block text-white mb-3" style="background-color: purple;">Login</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
