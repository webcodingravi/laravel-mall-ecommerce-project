@extends('layouts.app')

@section('content')
<main class="main">
    <div class="text-center page-header" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">F.A.Q</h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="accordion accordion-rounded" id="accordion-1">
                @if (!empty($getFaq))
                @foreach ($getFaq as $faq)
                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-1">
                        <h2 class="card-title">
                            <a role="button" data-toggle="collapse" href="#collapse-{{$faq->id}}" aria-expanded="true" aria-controls="collapse-{{$faq->id}}">
                                {{$faq->question}}
                            </a>
                        </h2>
                    </div>

                    <div id="collapse-{{$faq->id}}" class="collapse " aria-labelledby="heading-1" data-parent="#accordion-1">
                        <div class="card-body">
                            {!!$faq->answer!!}
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                   <h3>No Record Found.</h3>
                @endif

            </div>


        </div>
    </div>

    <div class="pt-4 pb-4 cta cta-display bg-image" style="background-image: url(assets/images/backgrounds/cta/bg-7.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-7">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="text-white cta-title">If You Have More Questions</h3>
                        </div>

                        <div class="col-auto">
                            <a href="{{route('contact')}}" class="btn btn-outline-white"><span>CONTACT US</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End .main -->

@endsection
