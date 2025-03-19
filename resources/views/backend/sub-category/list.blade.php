@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1>Sub Category List (Total: {{$SubCategories->total()}})</h1>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="{{route('sub-category.list')}}">
          <input type="text" name="query" value="{{Request::get('query')}}" placeholder="Search" class="form-control" title="Enter search keyword" style="border-radius:0">
          <button type="submit" class="btn btn-primary" title="Search" style="border-radius:0"><i class="bi bi-search"></i></button>
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
              <h5 class="card-title">Sub Category List <a class="btn btn-primary btn-sm"  href="{{route('sub-category.list')}}"><i class="bi bi-arrow-clockwise"></i> Reset</a></h5>
              <a class="btn btn-primary btn-sm" href="{{route('sub-category.create')}}">+ Add Sub Category</a>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Sub Category</th>
                    <th>Slug</th>
                    <th>Category Name</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($SubCategories->isNotEmpty())
                @foreach ($SubCategories as $SubCategory)
                  <tr>
                    <td>{{$SubCategory->name}}</td>
                    <td>{{$SubCategory->slug}}</td>
                    <td>{{$SubCategory->CategoryName}}</td>
                    <td>{{$SubCategory->created_by}}</td>
                    <td>
                    @if (!empty($SubCategory->status == 1))
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                       </td>
                    <td>{{\Carbon\Carbon::parse($SubCategory->created_at)->format('d M,Y')}}</td>

                    <td><a href="{{route('sub-category.edit',$SubCategory->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{route('sub-category.delete',$SubCategory->id)}}" onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
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

              {{$SubCategories->links('pagination::bootstrap-5')}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
