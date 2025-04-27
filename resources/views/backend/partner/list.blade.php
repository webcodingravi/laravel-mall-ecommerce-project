@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Partner List</h1>

    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title"><a class="btn btn-primary btn-sm"  href="{{route('partner.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-clockwise"></i> Reset</a></h5>
              <a class="btn btn-primary btn-sm" href="{{route('partner.create')}}" style="background: #cc9966; border:none">+ Add Partner</a>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th width="50">Image</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($partners->isNotEmpty())
                @foreach ($partners as $partner)
                  <tr>
                    <td>
                        @if (!empty($partner->image_name))
                            <img src="{{asset('uploads/partner_logo/'.$partner->image_name)}}" style="width: 150px; cursor:pointer;" alt="{{$partner->image_name}}">
                        @endif
                    </td>
                    <td>{{$partner->link}}</td>

                    <td>
                    @if (!empty($partner->status == 1))
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                       </td>
                       <td>{{\Carbon\Carbon::parse($partner->created_at)->format('d M,Y')}}</td>

                    <td>
                        <a href="{{route('partner.edit',$partner->id)}}" class="btn btn-primary btn-sm" style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="{{route('partner.delete',$partner->id)}}" onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
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

              {{$partners->links('pagination::bootstrap-5')}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
