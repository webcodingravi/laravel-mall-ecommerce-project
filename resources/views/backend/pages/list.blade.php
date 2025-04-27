@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="mb-4 pagetitle d-flex justify-content-between">
        <h1 style="color: #cc9966;">Pages</h1>

      </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="card">
            <div class="pt-4 card-body">
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($pages->isNotEmpty())
                @foreach ($pages as $page)
                  <tr>
                    <td>{{$page->name}}</td>
                    <td>{{$page->slug}}</td>
                    <td>{{$page->title}}</td>

                    <td><a href="{{route('page.edit',$page->id)}}" class="btn btn-primary btn-sm" style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
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
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection



