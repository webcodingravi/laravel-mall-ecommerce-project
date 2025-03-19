@extends('layouts.app')
@section('content')
<main class="main">>
    <div class="pt-8 pb-8 login-page bg-image pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url({{asset('assets/images/backgrounds/login-bg.jpg')}})">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link">Forgot Password</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" style="display: block">
                            @include('alertMessage.alertMessage')
                            <form action="{{route('ProcessForgotPassword')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Please Enter Email Address..." required>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Forgot</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>


                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
