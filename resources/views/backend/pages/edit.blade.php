@extends('backend.layouts.app')

@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Edit Page</h1>
      <a class="btn btn-primary btn-sm" href="{{route('page.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('page.update',$page->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-6">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" value="{{old('name',$page->name)}}" id="name" placeholder="Please Enter Name..."
                  class="form-control @error('name') is-invalid @enderror">
                   @error('name')
                       <span class="invalid-feedback">{{$message}}</span>
                   @enderror
                </div>

                <div class="col-6">
                  <label class="form-label">Slug</label>
                  <input type="text" value="{{old('slug',$page->slug)}}" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Please Enter Slug...">
                  @error('slug')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Title</label>
                    <input type="text" value="{{old('title',$page->title)}}" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Please Enter Title..">
                    @error('title')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" value="{{old('image',$page->title)}}" name="image" class="form-control @error('image') is-invalid @enderror" accept="image*/">
                    @error('image')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror

                    @if (!empty($page->image))
                    <div class="mt-3 display-img">
                        <img src="{{asset('uploads/pages/'.$page->image)}}"  height="200" alt="" style="cursor: pointer">
                    </div>
                    @endif

                  </div>

                  <div class="col-12">
                    <label class="form-label">Description</label>
                        <textarea name="description" class="tinymce-editor" id="" cols="30" rows="10" placeholder="Description...">{{old('title',$page->description)}}</textarea>

                  </div>


                  <div class="col-12">
                    <label class="form-label">Meta Title</label>
                    <input type="text" value="{{old('meta_title',$page->meta_title)}}" name="meta_title" class="form-control" placeholder="Please Enter Meta Title">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Meta Description</label>
                    <input type="text" value="{{old('meta_description',$page->meta_description)}}" name="meta_description" class="form-control" placeholder="Please Enter Meta Description">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" value="{{old('meta_keywords',$page->meta_keywords)}}" name="meta_keywords" class="form-control" placeholder="Please Enter Meta Keywords">

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
