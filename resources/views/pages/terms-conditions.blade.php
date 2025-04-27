@extends('layouts.app')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="mb-0 border-0 breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$TermsConditins->title}}</li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="text-center page-header page-header-big" style="background-image: url({{asset('uploads/pages/'.$TermsConditins->image)}})">
            <h1 class="text-white page-title">{{$TermsConditins->title}}</h1>
        </div>
    </div>

    <div class="pb-0 mb-5 page-content">
        <div class="container">
            <div class="row">
                <div class="mb-3 col-lg-12 mb-lg-0">
                    {!!$TermsConditins->description!!}

                </div>
                </div>
        </div>
    </div>
</main>
<!-- End .main -->

@endsection
