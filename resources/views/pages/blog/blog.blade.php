@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%), url({{ asset('uploads/pages/' . $blog->image) }})">
            <div class="container">
                <h1 class="page-title text-white">{{ $blog->title }}</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Blog</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9" id="blog-list">
                        @include('pages.blog.blog-list', ['getBlog' => $getBlog])
                        {{ $getBlog->links('pagination::bootstrap-5') }}
                    </div>

                    @include('pages.blog.sidebar')

                </div>
            </div>
        </div>
    </main>
@endsection
