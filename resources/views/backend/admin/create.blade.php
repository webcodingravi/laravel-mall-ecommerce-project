@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Create Admin</h1>
      <a class="btn btn-primary btn-sm" href="{{route('admin.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" value="{{old('name')}}" placeholder="Please Enter Name..." class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Email</label>
                  <input type="email" value="{{old('email')}}"  name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Please Enter Email...">
                  @error('email')
                  <span class="invalid-feedback">{{$message}}</span>
              @enderror
                </div>

                <div class="col-6">
                    <label fo class="form-label">Profile Pic</label>
                     <input type="file" name="image" class="form-control" accept="image/*"/>
                     @error('image')
                     <span class="text-danger">{{$message}}</span>
                 @enderror
                  </div>

                <div class="col-6">
                  <label fo class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Please Enter Password...">
                  @error('password')
                  <span class="invalid-feedback">{{$message}}</span>
              @enderror
                </div>

                <div class="col-6">
                    <label fo class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Please Enter Confirm Password...">
                    @error('confirm_password')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
                  </div>

                <div class="col-6">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                  </select>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary btn-sm" style="background: #cc9966; border:none">Submit</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
