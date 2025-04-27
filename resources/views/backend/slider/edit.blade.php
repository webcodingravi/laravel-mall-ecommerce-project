@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Edit Slider</h1>
      <a class="btn btn-primary btn-sm" href="{{route('slider.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-12">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" value="{{old('title',$slider->title)}}" placeholder="Please Enter Title..." class="form-control @error('title') is-invalid @enderror">
                  @error('title')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>


                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" name="image_name" value="{{old('image_name')}}" class="form-control" accept="image/*">
                    @error('image_name')
                        <span style="color:red">{{$message}}</span>
                    @enderror

                    @if (!empty($slider->image_name))
                    <div class="mt-3">
                      <img src="{{asset('uploads/slider/'.$slider->image_name)}}" class="img-fluid" style="width:200px; cursor:pointer;" alt="{{$slider->image_name}}" />
                    </div>
                    @endif


                  </div>

                  <div class="col-12">
                    <label class="form-label">Button Name</label>
                    <input type="text" name="button_name" value="{{old('button_name',$slider->button_name)}}" placeholder="Please Enter Button Name..." class="form-control">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" value="{{old('button_link',$slider->button_link)}}" placeholder="Please Enter Button Link..." class="form-control">

                  </div>

                <div class="col-12">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option value="1" {{($slider->status == '1') ? 'selected' : ''}}>Active</option>
                    <option value="0" {{($slider->status == '0') ? 'selected' : ''}}>Deactive</option>
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
