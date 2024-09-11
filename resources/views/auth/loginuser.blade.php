
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo">
                    <img src="../../assets/images/logo-dark.svg">
                  </div>
                  @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                  @if($errors->any())
                  @foreach($errors->all() as $err)
                  <p class="alert alert-danger">{{ $err }}</p>
                  @endforeach
                  @endif
                  <h4>Hello! let's get started</h4>
                  <h6 class="font-weight-light">Sign in to continue.</h6>
            <form method="POST" action="{{ route('login.custom') }}">
                @csrf
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group mb-3">
                    <input type="text" placeholder="username" id="username" class="form-control form-control-lg" name="username"
                        required autofocus>
                    @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="password" placeholder="Password" id="password" class="form-control form-control-lg" name="password"
                        required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Signin</button>
                </div>
            </form>
            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
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