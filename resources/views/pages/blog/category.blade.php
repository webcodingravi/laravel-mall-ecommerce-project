@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">{{ $getCategory->name }}</h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $getCategory->name }}</a></li>
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
