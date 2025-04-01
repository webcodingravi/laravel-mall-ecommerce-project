@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Admin List (Total: {{$getAdmins->total()}})</h1>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="{{route('admin.list')}}">
          <input type="text" name="query" value="{{Request::get('query')}}" placeholder="Search" class="form-control" title="Enter search keyword" style="border-radius:0">
          <button type="submit" class="btn btn-primary" title="Search" style="border-radius:0; background:#cc9966; border:none"><i class="bi bi-search"></i></button>
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
              <h5 class="card-title"><a class="btn btn-primary btn-sm" style="background: #cc9966; border:none;"  href="{{route('admin.list')}}"
                ><i class="bi bi-arrow-clockwise"></i> Reset</a></h5>
              <a class="btn btn-primary btn-sm" href="{{route('admin.create')}}" style="background: #cc9966; border:none;">+ Add Admin</a>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($getAdmins->isNotEmpty())
                @foreach ($getAdmins as $admin)
                  <tr>
                    <td>
                    @if (!empty($admin->image))
                   <img src="{{asset('uploads/profile_pic/'.$admin->image)}}" class="img-fluid" style="width: 100px; height:100px; object-fit:cover; border-radius:50%;">
                    @endif
                   </td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>

                    <td>
                    @if (!empty($admin->status == 1))
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                       </td>
                    <td>{{\Carbon\Carbon::parse($admin->created_at)->format('d M,Y')}}</td>

                    <td><a href="{{route('admin.edit',$admin->id)}}" class="btn btn-primary btn-sm" style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{route('admin.delete',$admin->id)}}" onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
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

              {{$getAdmins->links('pagination::bootstrap-5')}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
