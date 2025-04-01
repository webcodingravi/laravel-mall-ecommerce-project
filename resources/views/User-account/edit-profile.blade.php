@extends('layouts.app')
@section('content')
<main class="main">
    <div class="text-center page-header" style="background-image: url({{asset('assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">{{$meta_title}}</h1>
        </div>
    </div>

    <div class="mt-5 page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('User-account._sidebar')

                    <div class="col-md-8 col-lg-9">
                        @include('alertMessage.alertMessage')
                        <div class="tab-content">
                            <form action="{{route('UserUpdateProfile')}}"  method="post">
                                @csrf
                                        <h2 class="checkout-title">Billing Details</h2>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" value="{{old('name',$getRecord->name)}}" id="name" class="form-control" placeholder="Please Enter Your First Name..">
                                                    <p></p>

                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="last_name" value="{{old('last_name',$getRecord->last_name)}}" id="last_name" class="form-control" placeholder="Please Enter Your Last Name..">
                                                    <p></p>
                                                </div>
                                            </div>

                                            <label>Email address <span class="text-danger">*</span></label>
                                            <input type="text" name="email" readonly id="email_address" value="{{old('email',$getRecord->email)}}" class="form-control" placeholder="Please Enter Username@exmaple.com..">
                                            <p></p>

                                            <label>Company Name (Optional)</label>
                                            <input type="text" name="company_name" value="{{old('company_name',$getRecord->company_name)}}" class="form-control" placeholder="Please Enter Your Company Name..">

                                            <label>Country <span class="text-danger">*</span></label>
                                            <input type="text" value="{{old('country',$getRecord->country)}}" name="country" id="country" class="form-control" placeholder="Please Enter Your Country..">
                                            <p></p>

                                            <label>Street address</label>
                                            <input type="text" name="address_one" value="{{old('address_one',$getRecord->address_one)}}"  class="form-control" placeholder="House number and Street name">
                                            <input type="text" name="address_two" value="{{old('address_two',$getRecord->address_two)}}" class="form-control" placeholder="Appartments, suite, unit etc ...">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>City <span class="text-danger">*</span></label>
                                                    <input type="text" value="{{old('city',$getRecord->city)}}" id="city" name="city" class="form-control" placeholder="Please Enter Your City..">
                                                    <p></p>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>State <span class="text-danger">*</span></label>
                                                    <input type="text" name="state" id="state" value="{{old('state',$getRecord->state)}}" class="form-control" placeholder="Please Enter Your State..">
                                                  <p></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Postcode / ZIP <span class="text-danger">*</span></label>
                                                    <input type="text" name="postcode" id="postcode" value="{{old('postcode',$getRecord->postcode)}}" class="form-control" placeholder="Please Enter Your Postcode / Zip..">
                                                    <p></p>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" id="phone" value="{{old('phone',$getRecord->phone)}}" class="form-control" placeholder="Please Enter Your Phone Number..">
                                                    <p></p>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
