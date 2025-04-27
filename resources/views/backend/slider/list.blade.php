@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Slider List</h1>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="{{route('slider.list')}}">
          <input type="text" name="query" value="{{Request::get('query')}}" placeholder="Search" class="form-control" title="Enter search keyword" style="border-radius:0">
          <button type="submit" class="btn btn-primary" title="Search" style="border-radius:0; background: #cc9966; border:none"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title"><a class="btn btn-primary btn-sm"  href="{{route('slider.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-clockwise"></i> Reset</a></h5>
              <a class="btn btn-primary btn-sm" href="{{route('slider.create')}}" style="background: #cc9966; border:none">+ Add Slider</a>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th width="50">Image</th>
                    <th>Title</th>
                    <th>Button Name</th>
                    <th>Button Link</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($sliders->isNotEmpty())
                @foreach ($sliders as $slider)
                  <tr>
                    <td>
                        @if (!empty($slider->image_name))
                            <img src="{{asset('uploads/slider/'.$slider->image_name)}}" style="width: 200px; cursor:pointer;" alt="">
                        @endif
                    </td>
                    <td>{{$slider->title}}</td>
                    <td>{{$slider->button_name}}</td>
                    <td>{{$slider->button_link}}</td>

                    <td>
                    @if (!empty($slider->status == 1))
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                       </td>
                       <td>{{\Carbon\Carbon::parse($slider->created_at)->format('d M,Y')}}</td>

                    <td>
                        <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-primary btn-sm" style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{route('slider.delete',$slider->id)}}" onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                    </td>

                  </tr>
                   @endforeach
                @else
                <tr>
                 <td colspan="7">No Record Found.</td>
                </tr>
                 @endif
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              {{$sliders->links('pagination::bootstrap-5')}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
