@php
use App\Role;
$notadmin = Role::where('name', 'not like', "%Admin%")->get();
if (app()->view->getSections()['judul']) {
$judul = app()->view->getSections()['judul'];
}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hello Inspector! Feel Free To Check Out My Code">
    <meta name="author" content="Fahmi Aulia Rahman">
    <title>@yield('judul')</title>
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/tooltip.css">
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets') }}/images/logo.svg"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{ asset('assets') }}/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ asset('assets') }}/images/profile/{{ Auth::user()->photo }}" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->nama }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item text-success" href="#">
                                <i class="mdi mdi-account mr-2 text-success"></i> Profil Saya </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-primary" href="#">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ asset('assets') }}/images/profile/{{ Auth::user()->photo }}" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->nama }}</span>
                                @role($notadmin)
                                <span class="text-secondary text-small">Calon Siswa
                                    {{ Auth::user()->getRoleNames()[0] }}</span>
                                @else
                                <span class="text-secondary text-small">{{ Auth::user()->getRoleNames()[0] }}</span>
                                @endrole
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item @if ($judul === 'Dashboard') active @endif">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item @if ($judul === 'Ganti Password') active @endif">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Ganti Password</span>
                            <i class="mdi mdi-key-variant menu-icon"></i>
                        </a>
                    </li>
                    @role('Admin - SMP')
                    {{-- bukan(bukanAdmin) = Admin --}}
                    <li class="nav-item @if ($judul === 'Manajemen Siswa SMP') active @endif">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Manajemen Siswa SMP</span>
                            <i class="mdi mdi-account-search-outline menu-icon"></i>
                        </a>
                    </li>
                    @endrole
                    @role('Admin - SMA')
                    {{-- bukan(bukanAdmin) = Admin --}}
                    <li class="nav-item @if ($judul === 'Manajemen Siswa SMA') active @endif">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Manajemen Siswa SMA</span>
                            <i class="mdi mdi-account-search-outline menu-icon"></i>
                        </a>
                    </li>
                    @endrole
                    @role('Admin - SMK')
                    {{-- bukan(bukanAdmin) = Admin --}}
                    <li class="nav-item @if ($judul === 'Manajemen Siswa SMK') active @endif">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Manajemen Siswa SMK</span>
                            <i class="mdi mdi-account-search-outline menu-icon"></i>
                        </a>
                    </li>
                    @endrole
                    @role('Admin - Keuangan')
                    {{-- bukan(bukanAdmin) = Admin --}}
                    <li class="nav-item @if ($judul === 'Pembuatan Nota') active @endif">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Pembuatan Nota</span>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                    </li>
                    @endrole

                    @hasanyrole($notadmin)
                    <li class="nav-item @if ($judul === 'Biodata Calon Siswa') active @endif">
                        <a class="nav-link" href="{{ route('biodata.index') }}">
                            <span class="menu-title">Biodata Calon Siswa</span>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item @if ($judul === 'Data Orang Tua / Wali') active @endif">
                        <a class="nav-link" href="{{ route('orangtua.index') }}">
                            <span class="menu-title">Data Orang Tua / Wali</span>
                            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item @if ($judul === 'Cetak Kartu Ujian') active @endif">
                        <a class="nav-link" href="{{ route('examcard') }}">
                            <span class="menu-title">Cetak Kartu Ujian</span>
                            <i class="mdi mdi-account-card-details menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item @if ($judul === 'Informasi Kelulusan') active @endif">
                        <a class="nav-link" href="{{ route('information') }}">
                            <span class="menu-title">Informasi Kelulusan</span>
                            <i class="mdi mdi-account-check menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item @if ($judul === 'Rincian Biaya') active @endif">
                        <a class="nav-link" href="{{ route('biaya') }}">
                            <span class="menu-title">Rincian Biaya</span>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                    </li>
                    @endrole
                    <li class="nav-item @if ($judul === 'Keluar') active @endif">
                        <a class="nav-link" href="{{ route('logout') }}" data-toggle="modal"
                            data-target="#exampleModal">
                            <span class="menu-title">Keluar</span>
                            <i class="mdi mdi-logout menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">@yield('judul')</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @yield('konten')
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                            ©{{date('Y')}} <a href="https://www.fahmi.xyz/" target="_blank">rev3rsed</a>.
                            All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made
                            with <i class="mdi mdi-heart text-danger"></i> for my final exam.</span>
                    </div>
                </footer>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah ananda yakin ingin keluar dari aplikasi PPDB ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets') }}/js/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/misc.js"></script>
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('assets') }}/js/autoNumeric.js"></script>
    <script>
        var rev3rsed=['tooltip','[data-toggle=\x22tooltip\x22]'];(function(rEv3rsed,REv3rsed){var reV3rsed=function(ReV3rsed){while(--ReV3rsed){rEv3rsed['push'](rEv3rsed['shift']());}};reV3rsed(++REv3rsed);}(rev3rsed,0x1ad));var Rev3rsed=function(rEv3rsed,REv3rsed){rEv3rsed=rEv3rsed-0x0;var reV3rsed=rev3rsed[rEv3rsed];return reV3rsed;};$(document)['ready'](function(){$(Rev3rsed('0x0'))[Rev3rsed('0x1')]();});
    </script>
    <script>
        var dp8s9=['#datepicker','datepicker'];(function(dP8s9,DP8s9){var dp8S9=function(Dp8S9){while(--Dp8S9){dP8s9['push'](dP8s9['shift']());}};dp8S9(++DP8s9);}(dp8s9,0x1b0));var Dp8s9=function(dP8s9,DP8s9){dP8s9=dP8s9-0x0;var dp8S9=dp8s9[dP8s9];return dp8S9;};$(function(){$(Dp8s9('0x0'))[Dp8s9('0x1')]({'dateFormat':'yy-mm-dd'});});
    </script>

    @yield('js')
</body>

</html>
