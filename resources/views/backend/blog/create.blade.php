@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Create Blog Category</h1>
      <a class="btn btn-primary btn-sm" href="{{route('BlogCategory.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('BlogCategory.store')}}" method="post">
                @csrf
                <div class="col-6">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Please Enter Name..." class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Slug</label>
                  <input type="text" value="{{old('slug')}}" name="slug" readonly id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Please Enter Slug...">
                  @error('slug')
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

                <div class="col-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control" placeholder="Please Enter Meta_title...">
                  </div>

                  <div class="col-6">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" id="" cols="4" rows="2" class="form-control" placeholder="Please Enter Meta Description...">{{old('meta_description')}}</textarea>
                  </div>

                  <div class="col-6">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" value="{{old('meta_keywords')}}" name="meta_keywords" class="form-control" placeholder="Please Enter Meta Keywords...">
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


@section('script')
<script>
    $(document).ready(function() {
      $("#name").keyup(function() {
        element = $(this).val();
        $.ajax({
           url : '{{route("slug")}}',
           type: 'get',
           data : {title : element},
           dataType : 'json',
           success : function(response) {
            if(response['status'] == true) {
                $("#slug").val(response['slug']);
            }

           }
        });
      })
    });

</script>


@endsection
