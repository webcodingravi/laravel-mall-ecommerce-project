<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('front/assets/images/logo-icon.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    {{-- jquery file --}}
    <script src="{{asset('assets/jquery/jquery-3.6.0.min.js')}}"></script>

</head>

<body style="height: 100vh; background-image:url('front/assets/images/backgrounds/login-bg.jpg')">

  <main>
    <div class="container">

      <section class="py-4 section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="py-4 d-flex justify-content-center">
                <a href="{{route('home')}}" class="w-auto logo d-flex align-items-center">
                  <img src="{{asset('front/assets/images/logo-footer.png')}}" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="mb-3 card">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="pb-0 text-center card-title fs-4" style="color: #cc9966; ">Login to Your Account</h5>
                    <p class="text-center small">Enter your Email & password to login</p>
                  </div>
                   @include('alertMessage.alertMessage')
                  <form class="row g-3" action="{{route('login.process')}}" method="post">
                    @csrf
                    <div class="col-12">
                      <label class="form-label">Email</label>
                      <div class="input-group">
                        <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  placeholder="Username@example.com">
                         @error('email')
                          <span class="invalid-feedback">{{$message}}</span>
                         @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*****************">
                      @error('password')
                          <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" style="background: #cc9966; border:none">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="mb-0"> <a href="{{route('forgotPassword')}}" style="color: #cc9966;">Forgot Password</a></p>
                    </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script>
    setTimeout(() => {
      $("#box").fadeOut('slow')
    }, 3000);
</script>
</body>

</html>
