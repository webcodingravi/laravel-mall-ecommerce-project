@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1>Product List (Total: {{$products->total()}})</h1>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="{{route('product.list')}}">
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
              <h5 class="card-title">Product List <a class="btn btn-primary btn-sm"  href="{{route('product.list')}}"><i class="bi bi-arrow-clockwise"></i> Reset</a></h5>
              <a class="btn btn-primary btn-sm" href="{{route('product.create')}}">+ Add Product</a>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($products->isNotEmpty())
                @foreach ($products as $product)
                  <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->slug}}</td>
                    <td>{{$product->created_by}}</td>
                    <td>
                    @if (!empty($product->status == 1))
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                       </td>
                    <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M,Y')}}</td>

                    <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{route('product.delete',$product->id)}}" onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
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

              {{$products->links('pagination::bootstrap-5')}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
