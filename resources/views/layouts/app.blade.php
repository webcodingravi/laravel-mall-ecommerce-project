<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{!empty($meta_title) ? $meta_title : ''}}</title>
    @if (!empty($meta_description))
    <meta name="description" content="{{$meta_description}}">
    @endif
    @if (!empty($meta_keywords))
    <meta name="keywords" content="{{$meta_keywords}}">
     @endif

    <!-- Favicon -->
    @if (!empty(getSystemSetting()->favicon))
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('uploads/setting/favicon/'.getSystemSetting()->favicon)}}">
    @endif

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/nouislider/nouislider.css')}}">
    {{-- Bootstrap-5 style sheet --}}
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <style>
       .btn-wishlist-add::before {
          content: '\f233'
       }
    </style>
    @yield('style')
</head>

<body>
    <div class="page-wrapper">
           @include('layouts.header')

        <!-- End .header -->

        @yield('content')
        <!-- End .main -->

          @include('layouts.footer')

        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
      @include('layouts.mobile-nav')
    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#" id="SubmitFormLogin" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="s_email">Email address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="s_email" name="email" placeholder="Username@example.com">
                                            <p></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="s_password" name="password" placeholder="*****************..">
                                            <p></p>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="is_remember" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div>

                                            <a href="{{route('forgotPassword')}}" class="forgot-link">Forgot Your Password?</a>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form id="SubmitFormRegister" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Please Enter Your Name..">
                                            <p></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="s_email">Your email address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Username@example.com">
                                            <p></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="s_password">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="*****************..">
                                            <p></p>
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="*****************..">
                                            <p></p>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            {{-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy">
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div> --}}
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="bg-white row no-gutters newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="text-center banner-content">
                            <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div>
                                </div>
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{asset('front/assets/images/popup/newsletter/img-1.jpg')}}" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('front/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/js/nouislider.min.js')}}"></script>
    <script src="{{asset('front/assets/js/wNumb.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.elevateZoom.min.js')}}"></script>
    <script src="{{asset('front/assets/bootstrap-input-spinner.js"')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Main JS File -->
  <script src="{{asset('front/assets/js/main.js')}}"></script>

    <script>
        setTimeout(() => {
          $("#box").fadeOut('slow')
        }, 3000);

    //  login form ajax
    $('body').delegate("#SubmitFormLogin","submit", function(e) {
         e.preventDefault();
         $.ajax({
            url : "{{route('UserLogin')}}",
            type : "post",
            data: $(this).serialize(),
            dataType: "json",
            success:function(data) {
                alert(data.message)
                if(data.status == true) {
                    $("#s_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    $("#s_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                    location.reload();
                }else{
                    alert(data.message)
                     if(data.error['email']) {
                        $("#s_email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.error['email']);
                     }else{
                        $("#s_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     }

                     if(data.error['password']) {
                        $("#s_password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.error['password']);
                     }else{
                        $("#s_password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                     }

                }
            }
         });
    });





    //   register form ajax
      $('body').delegate("#SubmitFormRegister","submit",function(e) {
         e.preventDefault();
         $.ajax({
             url : "{{route('UserRegister')}}",
             type: "post",
             data: $(this).serialize(),
             dataType: "json",
             success:function(data) {
                alert(data.message);
              if(data.status == true) {
                  location.reload();

                $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#confirm_password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

              }else{
                  if(data.error['name']) {
                    $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.error['name']);
                  }else{
                    $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.error['email']) {
                    $("#email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.error['email']);
                  }else{
                    $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.error['password']) {
                    $("#password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.error['password']);
                  }else{
                    $("#password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.error['confirm_password']) {
                    $("#confirm_password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.error['confirm_password']);
                  }else{
                    $("#confirm_password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

              }
             }

         });
      });



    </script>

    @yield('script')



</body>


<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>
