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
                        <div class="tab-content">
                             <div class="conainter">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">{{$TotalOrder}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Total Order</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">{{$TotalTodayOrder}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Today Order</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">${{number_format($TotalAmount,2)}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Total Amount</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="mt-3 col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">${{number_format($TotalTodayAmount,2)}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Today Amount</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="mt-3 col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">{{$PendingOrder}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Pending Order</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="mt-3 col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">{{$InProgressOrder}}</h4>
                                                <span class="mt-0" style="font-size: 17px">In Progress Order</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="mt-3 col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">{{$CompletedOrder}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Completed Order</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="mt-3 col-md-4">
                                        <div class="border-0 shadow card">
                                            <div class="text-center card-body">
                                              <div class="mt-2">
                                                <h4 class="mb-0 fw-bold" style="font-size: 25px">{{$CancelledOrder}}</h4>
                                                <span class="mt-0" style="font-size: 17px">Cancelled Order</span>
                                              </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>


                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
