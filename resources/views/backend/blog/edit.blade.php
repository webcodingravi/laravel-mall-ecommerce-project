@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Blog / Edit</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('blog.list') }}" style="background: #cc9966; border:none"><i
                    class="bi bi-arrow-right-circle-fill"></i> Back</a>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('blog.update', $blog->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                                        id="title" class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" value="{{ old('slug', $blog->slug) }}" name="slug" readonly
                                        id="slug" class="form-control @error('slug') is-invalid @enderror">
                                    @error('slug')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-lable">Category</label>
                                    <select name="blog_category_id" class="form-select">
                                        @if (!empty($getBlogCategory))
                                            @foreach ($getBlogCategory as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $blog->blog_category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-lable">Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">

                                    @if (!empty($blog->image))
                                        <img src="/uploads/blogs/{{ $blog->image }}" class="mt-4 w-25"
                                            alt={{ $blog->title }}>
                                    @endif



                                </div>

                                <div class="col-12">
                                    <label class="form-lable">Description</label>
                                    <textarea name="description" class="tinymce-editor" class="form-control">{{ $blog->description }}</textarea>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Deactive
                                        </option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" value="{{ old('meta_title', $blog->meta_title) }}"
                                        name="meta_title" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" id="" cols="4" rows="2" class="form-control">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                                        name="meta_keywords" class="form-control"
                                        placeholder="Please Enter Meta Keywords...">
                                </div>


                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="background: #cc9966; border:none">Update</button>
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
