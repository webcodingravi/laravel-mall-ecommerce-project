@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Account Setting</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('dashboard') }}" style="background: #cc9966; border:none"><i
                    class="bi bi-arrow-right-circle-fill"></i> Back</a>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6">
                                    <label class="form-label">First</label>
                                    <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                                        class="form-control">

                                </div>

                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $admin->last_name) }}"
                                        class="form-control">

                                </div>


                                <div class="col-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" value="{{ $admin->email }}" disabled name="email"
                                        class="form-control " placeholder="Please Enter Email...">
                                </div>

                                <div class="col-6">
                                    <label fo class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Please Enter Password...">
                                    <span class="text-muted" style="font-size: 13px;">If you want to change your password,
                                        fill in this field</span>
                                </div>


                                <div class="col-12">
                                    <label fo class="form-label">Profile Pic</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" />
                                    @if (!empty($admin->image))
                                        <div class="mt-3">
                                            <img src="{{ asset('uploads/profile_pic/' . $admin->image) }}"
                                                style="width:100px;">
                                        </div>
                                    @endif
                                </div>


                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="background: #cc9966; border:none">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
