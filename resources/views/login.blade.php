<!DOCTYPE html>
<html lang="en">

<head>
    <title>Silakar | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="login_assets/vendor/daterangepicker/daterangepicker.css"> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="login_assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <h4 style="background: #f2f2f2; text-align:center; padding-bottom:30px; font-family:Poppins-bold">Log In
            </h4>
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{ url('/login') }}">
                    @csrf
                    <span class="login100-form-title p-b-48">
                        <img src="assets/images/logo/LogoPuskesmas.png" class="img-fluid w-75 h-auto" alt="">
                    </span>
                    @if ($errors->has('login'))
                        <div class="text-danger">{{ $errors->first('login') }}</div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate = "Enter Username">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="login_assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="login_assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="login_assets/vendor/bootstrap/js/popper.js"></script>
    <script src="login_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="login_assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="login_assets/js/main.js"></script>

</body>

</html>
