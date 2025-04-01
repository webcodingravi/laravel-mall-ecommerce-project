@extends('layouts.app')
@section('content')
<main class="main">
    <div class="text-center page-header" style="background-image: url({{asset('assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">{{$meta_title}}</h1>
        </div>
    </div>

    <div class="mt-5 page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('User-account._sidebar')

                    <div class="col-md-8 col-lg-9">
                        @include('alertMessage.alertMessage')
                        <div class="tab-content">
                            <form action="{{route('update-password')}}"  method="post">
                            @csrf
                            <div class="row">

                            <label>Old Password <span class="text-danger">*</span></label>
                            <input type="password" name="old_password" value="{{old('old_password')}}" class="form-control" placeholder="Old Password..">

                            <label>New Password <span class="text-danger">*</span></label>
                            <input type="password" name="new_password" value="{{old('new_password')}}" class="form-control" placeholder="New Password..">


                            <label>New Password <span class="text-danger">*</span></label>
                            <input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control" placeholder="Confirm Password..">


                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Update Password</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
