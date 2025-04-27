@extends('layouts.app')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="mb-0 border-0 breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$contact->title}}</li>
            </ol>
        </div>
    </nav>
    <div class="container">
        <div class="text-center page-header page-header-big" style="background-image: url({{asset('uploads/pages/'.$contact->image)}})">
            <h1 class="text-white page-title">{{$contact->title}}</h1>
        </div>
    </div>

    <div class="pb-0 page-content">
        <div class="container">
            <div class="row">
                <div class="mb-2 col-lg-6 mb-lg-0">
                    {!!$contact->description!!}
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    @if (!empty(getSystemSetting()->address))
                                    <li>
                                        <i class="icon-map-marker"></i>
                                        {{getSystemSetting()->address}}
                                    </li>
                                    @endif

                                    @if (!empty(getSystemSetting()->phone))
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:{{getSystemSetting()->phone}}">{{getSystemSetting()->phone}}</a>
                                    </li>
                                    @endif

                                    @if (!empty(getSystemSetting()->phone_two))
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:{{getSystemSetting()->phone_two}}">{{getSystemSetting()->phone_two}}</a>
                                    </li>
                                    @endif


                                    @if (!empty(getSystemSetting()->email))
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:{{getSystemSetting()->email}}">{{getSystemSetting()->email}}</a>
                                    </li>
                                    @endif

                                    @if (!empty(getSystemSetting()->email_two))
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:{{getSystemSetting()->email_two}}">{{getSystemSetting()->email_two}}</a>
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="contact-info">
                                <ul class="contact-list">
                                    @if (!empty(getSystemSetting()->working_hour))
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <span class="text-dark">{{getSystemSetting()->working_hour}}
                                    </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @include('alertMessage.alertMessage')
                    <h2 class="mb-1 title">Got Any Questions?</h2>
                    <p class="mb-2">Use the form below to get in touch with the sales team</p>

                    <form action="{{route('SubmitContact')}}" class="mb-3 contact-form" autocomplete="off" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Name</label>
                                <input type="text" value="{{old('name')}}" class="form-control @error('name')is-invalid @enderror" name="name" id="cname" placeholder="Name *">
                                @error('name')
                                <span class="invalid-feedback" style="margin-top:-20px;">{{$message}}</span>
                                @enderror

                            </div>

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Email</label>
                                <input type="text" value="{{old('email')}}" class="form-control  @error('email')is-invalid @enderror" name="email" id="cemail" placeholder="Email *">
                                @error('email')
                                <span class="invalid-feedback" style="margin-top:-20px;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="tel" value="{{old('phone')}}" class="form-control @error('phone')is-invalid @enderror" name="phone" id="cphone" placeholder="Phone">
                                @error('phone')
                                <span class="invalid-feedback" style="margin-top:-20px;">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label for="csubject" class="sr-only">Subject</label>
                                <input type="text" value="{{old('subject')}}" class="form-control @error('subject')is-invalid @enderror" name="subject" id="csubject" placeholder="Subject">
                                @error('subject')
                                <span class="invalid-feedback" style="margin-top:-20px;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <label for="cmessage" class="sr-only">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" cols="30" rows="4" name="message" id="cmessage" placeholder="Message *">{{old('message')}}</textarea>
                        @error('message')
                        <span class="invalid-feedback" style="margin-top:-20px;">{{$message}}</span>
                        @enderror

                        <div class="row">
                        <div class="col-sm-12">
                            <label for="verification">{{$first_number}} + {{$second_number}} = ?</label>
                            <input type="text" class="form-control" name="verification" id="verification" placeholder="Verification Sum">
                        </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            </div>
        </div>
    </div>
</main>

@endsection
