@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Edit Color</h1>
      <a class="btn btn-primary btn-sm" href="{{route('color.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('color.update',$color->id)}}" method="post">
                @csrf
                @method('put')
                <div class="col-6">
                  <label class="form-label">Color Name</label>
                  <input type="text" name="name" value="{{old('name',$color->name)}}" id="name" placeholder="Please Enter Color Name..." class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Code</label>
                  <input type="color" value="{{old('code',$color->code)}}" name="code" id="code" class="form-control">

                </div>

                <div class="col-6">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                   <option {{($color->status == 1) ? 'selected' : ''}} value="1">Active</option>
                   <option {{($color->status == 0) ? 'selected' : ''}} value="0">Deactive</option>
                  </select>
                </div>


                <div class="">
                  <button type="submit" class="btn btn-primary btn-sm" style="background: #cc9966; border:none">Update</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

@endsection
