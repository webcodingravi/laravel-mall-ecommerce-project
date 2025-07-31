@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Home Setting</h1>
        </div>
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3 gap-2" action="{{ route('UpdateHomeSetting') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Trendy Product Title</label>
                                    <input type="text" name="trendy_product_title"
                                        value="{{ $getRecord->trendy_product_title }}" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Shop Category Title</label>
                                    <input type="text" name="shop_category_title"
                                        value="{{ $getRecord->shop_category_title }}" class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Recent Arrival Title</label>
                                    <input type="text" name="recent_arrival_title"
                                        value="{{ $getRecord->recent_arrival_title }}" class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Blog Title</label>
                                    <input type="text" name="blog_title" value="{{ $getRecord->blog_title }}"
                                        class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Payment Delivery Title</label>
                                    <input type="text" name="payment_delivery_title"
                                        value="{{ $getRecord->payment_delivery_title }}" class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Payment Delivery Description</label>
                                    <textarea rows="3" name="payment_delivery_description" class="form-control">{{ $getRecord->payment_delivery_description }}</textarea>

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Payment Delivery Image</label>
                                    <input type="file" name="payment_delivery_image" class="form-control">
                                    @if (!empty($getRecord->payment_delivery_image))
                                        <div class="mt-3">
                                            <img src="{{ asset('uploads/home-setting/' . $getRecord->payment_delivery_image) }}"
                                                class="img-fluid" style="width:100px">
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Refund Title</label>
                                    <input type="text" name="refund_title" value="{{ $getRecord->refund_title }}"
                                        class="form-control">

                                </div>


                                <div class="col-12">
                                    <label class="form-label">Refund Description</label>
                                    <textarea rows="3" name="refund_description" class="form-control">{{ $getRecord->refund_description }}</textarea>

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Refund Image</label>
                                    <input type="file" name="refund_image" class="form-control">
                                    @if (!empty($getRecord->refund_image))
                                        <div class="mt-3">
                                            <img src="{{ asset('uploads/home-setting/' . $getRecord->refund_image) }}"
                                                class="img-fluid" style="width:100px">
                                        </div>
                                    @endif
                                </div>


                                <div class="col-12">
                                    <label class="form-label">Support Title</label>
                                    <input type="text" name="support_title" value="{{ $getRecord->support_title }}"
                                        class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Support Description</label>
                                    <textarea rows="3" name="support_description" class="form-control">{{ $getRecord->support_description }}</textarea>

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Support Image</label>
                                    <input type="file" name="support_image" class="form-control">
                                    @if (!empty($getRecord->support_image))
                                        <div class="mt-3">
                                            <img src="{{ asset('uploads/home-setting/' . $getRecord->support_image) }}"
                                                class="img-fluid" style="width:100px">
                                        </div>
                                    @endif
                                </div>


                                <div class="col-12">
                                    <label class="form-label">Signup Title</label>
                                    <input type="text" name="signup_title" value="{{ $getRecord->signup_title }}"
                                        class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Signup Description</label>
                                    <textarea rows="3" name="signup_description" class="form-control">{{ $getRecord->signup_description }}</textarea>

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Signup Image</label>
                                    <input type="file" name="signup_image" class="form-control">
                                    @if (!empty($getRecord->signup_image))
                                        <div class="mt-3">
                                            <img src="{{ asset('uploads/home-setting/' . $getRecord->signup_image) }}"
                                                class="img-fluid" style="width:100px">
                                        </div>
                                    @endif
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
