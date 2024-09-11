<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="stylesheet" href="{!! asset('assets/vendors/mdi/css/materialdesignicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/vendors/css/vendor.bundle.base.css') !!}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{!! asset('assets/vendors/font-awesome/css/font-awesome.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') !!}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{!! asset('assets/images/favicon.png') !!}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="{!! asset('assets/images/favicon-no-bg.png') !!}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{!! asset('assets/images/favicon-logo.png') !!}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{!! asset('assets/images/faces/face28.png') !!}" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Hi,@forelse($diri as $post)
                    {{ $post->nama }}
                    @empty
                    <tr>
                        <td class="text-center text-muted" colspan="10">Data tidak tersedia </td>
                    </tr>
                @endforelse </p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="{!! asset('assets/images/faces/face28.png') !!}"
                                    alt="">
                            </div>
                            <div class="p-2">
                                <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Inbox</span>
                                    <span class="p-0">
                                        <span class="badge badge-primary">3</span>
                                        <i class="mdi mdi-email-open-outline ml-1"></i>
                                    </span>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="{{route('signout')}}">
                                    <span>Log Out</span>
                                    <i class="mdi mdi-logout ml-1"></i>
                                </a>
                            </div>
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
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                          <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                          <span class="menu-title">Data Antrian</span>
                          <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('home/today') }}">Antrian Hari Ini</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ url('home/noantrian') }}">Seluruh Data Antrian</a></li>
                            {{-- <li class="nav-item"> <a class="nav-link" href="{{ url('home/noantrian') }}">Typography</a></li> --}}
                          </ul>
                        </div>
                      </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/noantrian') }}">
                            <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                            <span class="menu-title">Data Antrian</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/pasien') }}">
                            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                            <span class="menu-title">Data pasien</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/admin') }}">
                            <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                            <span class="menu-title">Data Admin</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/admin') }}">
                            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                            <span class="menu-title">Data Admin</span>
                        </a>
                    </li>
                    <li class="nav-item sidebar-user-actions">
                        <div class="sidebar-user-menu">
                            <a href="{{route('signout')}}" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                                <span class="menu-title">Log Out</span></a>
                        </div>
                    </li>
                </ul>
            </nav>
                <!-- partial -->
                @yield('content')
                <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{!! asset('assets/vendors/js/vendor.bundle.base.js') !!}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{!! asset('assets/vendors/chart.js/Chart.min.js') !!}"></script>
    <script src="{!! asset('assets/vendors/jquery-circle-progress/js/circle-progress.min.js') !!}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{!! asset('assets/js/off-canvas.js') !!}"></script>
    <script src="{!! asset('assets/js/hoverable-collapse.js') !!}"></script>
    <script src="{!! asset('assets/js/misc.js') !!}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{!! asset('assets/js/dashboard.js') !!}"></script>
    <!-- End custom js for this page -->
</body>

</html>
