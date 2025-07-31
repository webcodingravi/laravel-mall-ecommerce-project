@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Payment Setting</h1>
        </div>
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3 gap-2" action="{{ route('update_payment_setting') }}" method="post">
                                @csrf

                                <div class="col-12">
                                    <label class="form-label">Cash on Delivery (ON / OFF)</label>
                                    <input type="checkbox" name="is_cash_delivery" class="d-block"
                                        {{ !empty($getRecord->is_cash_delivery) ? 'checked' : '' }}>
                                </div>

                                <hr />
                                <div class="col-12">
                                    <label class="form-label">Paypal (ON / OFF)</label>
                                    <input type="checkbox" name="is_paypal" class="d-block"
                                        {{ !empty($getRecord->is_paypal) ? 'checked' : '' }}>
                                </div>



                                <div class="col-12">
                                    <label class="form-label">Paypal Email ID</label>
                                    <input type="text" name="paypal_id" value="{{ $getRecord->paypal_id }}"
                                        class="form-control">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Paypal Status</label>
                                    <select class="form-select" name="paypal_status">
                                        <option value="sandbox"
                                            {{ $getRecord->paypal_status == 'sandbox' ? 'selected' : '' }}>
                                            Sandbox</option>
                                        <option value="live" {{ $getRecord->paypal_status == 'live' ? 'selected' : '' }}>
                                            Live</option>
                                    </select>


                                </div>
                                <hr />

                                <div class="col-12">
                                    <label class="form-label">Stripe (ON / OFF)</label>
                                    <input type="checkbox" name="is_stripe" class="d-block"
                                        {{ !empty($getRecord->is_stripe) ? 'checked' : '' }}>
                                </div>


                                <div class="col-12">
                                    <label class="form-label">Stripe Public Key</label>
                                    <input type="text" name="stripe_public_key"
                                        value="{{ $getRecord->stripe_public_key }}" class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Stripe Secret Key</label>
                                    <input type="text" name="stripe_secret_key"
                                        value="{{ $getRecord->stripe_secret_key }}" class="form-control">

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
