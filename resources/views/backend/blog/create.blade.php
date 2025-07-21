@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Blog Create</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('blog.list') }}" style="background: #cc9966; border:none"><i
                    class="bi bi-arrow-right-circle-fill"></i> Back</a>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('blog.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" id="title"
                                        placeholder="Please Enter Title..."
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" value="{{ old('slug') }}" name="slug" readonly id="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
                                        placeholder="Please Enter Slug...">
                                    @error('slug')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-lable">Category</label>
                                    <select name="blog_category_id" class="form-select">
                                        <option hidden>Please Select...</option>
                                        @if (!empty($getBlogCategory))
                                            @foreach ($getBlogCategory as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-lable">Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">

                                </div>

                                <div class="col-12">
                                    <label class="form-lable">Description</label>
                                    <textarea name="description" class="tinymce-editor" placeholder="Description.." class="form-control"></textarea>
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
                                    <input type="text" value="{{ old('meta_title') }}" name="meta_title"
                                        class="form-control" placeholder="Please Enter Meta_title...">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" id="" cols="4" rows="2" class="form-control"
                                        placeholder="Please Enter Meta Description...">{{ old('meta_description') }}</textarea>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" value="{{ old('meta_keywords') }}" name="meta_keywords"
                                        class="form-control" placeholder="Please Enter Meta Keywords...">
                                </div>


                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="background: #cc9966; border:none">Submit</button>
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
            $("#title").keyup(function() {
                element = $(this).val();
                $.ajax({
                    url: '{{ route('slug') }}',
                    type: 'get',
                    data: {
                        title: element
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response['status'] == true) {
                            $("#slug").val(response['slug']);
                        }

                    }
                });
            })
        });
    </script>
@endsection
