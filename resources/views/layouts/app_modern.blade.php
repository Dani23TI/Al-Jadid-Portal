<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} :: {{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('modern/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('modern/src/assets/css/styles.min.css') }}" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            background-image: url('/images/bg2.jpg'); /* Path gambar */
            background-size: cover; /* Membuat gambar menutupi seluruh halaman */
            background-position: center; /* Gambar di tengah */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            background-attachment: fixed; /* Background tetap saat scroll */
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-image: url('{{ asset('images/background.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="images/Logo.png" width="60" height="80">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">
                                {{-- style="color:darkturquoise;" (Untuk ganti warna tulisan) --}}
                                <i class="ti ti-layout-dashboard"></i>
                                <strong>Beranda</strong>
                            </a>
                        </li>
                        @auth
                            <!-- Dropdown Pengurus -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="pasienDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-user"></i>
                                    <strong>Pengurus</strong>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="pasienDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pengurus.index') }}">
                                            <strong>Lihat Data Pengurus</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pengurus.create') }}">
                                            <strong>Tambah Data Pengurus</strong>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                        <!-- Berita -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan-pasien') }}">
                                <i class="ti ti-layout-dashboard"></i>
                                <strong>Berita</strong>
                            </a>
                        </li>
                        <!-- Dokumentasi -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan-daftar') }}">
                                <i class="ti ti-layout-dashboard"></i>
                                <strong>Dokumentasi</strong>
                            </a>
                        </li>
                    </ul>
                    {{-- BELL --}}
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    {{-- PROFIL --}}
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav" align="right">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <a class="btn btn-primary">{{ auth()->user()->name }}</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('modern/src/assets/images/profile/user-1.jpg') }}"
                                        alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">{{ auth()->user()->name }}</p>
                                        </a>
                                        <a href="#"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">

            <div class="container-fluid">
                @include('flash::message')
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('modern/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modern/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('modern/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('modern/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>
