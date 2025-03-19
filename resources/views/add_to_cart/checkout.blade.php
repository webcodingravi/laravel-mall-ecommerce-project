@extends('layouts.app')
@section('content')
<main class="main">
    <div class="mt-5 page-content">
        <div class="checkout">
            <div class="container">

                <form action="{{route('PlaceOrder')}}" id="ShowForm" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" value="{{old('first_name')}}" id="first_name" class="form-control" placeholder="Please Enter Your First Name..">
                                        <p></p>


                                    </div>

                                    <div class="col-sm-6">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" value="{{old('last_name')}}" id="last_name" class="form-control" placeholder="Please Enter Your Last Name..">
                                        <p></p>
                                    </div>
                                </div>

                                <label>Company Name (Optional)</label>
                                <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control" placeholder="Please Enter Your Company Name..">

                                <label>Country <span class="text-danger">*</span></label>
                                <input type="text" value="{{old('country')}}" name="country" id="country" class="form-control" placeholder="Please Enter Your Country..">
                                <p></p>

                                <label>Street address</label>
                                <input type="text" name="address_one" value="{{old('address_one')}}"  class="form-control" placeholder="House number and Street name">
                                <input type="text" name="address_two" value="{{old('address_two')}}" class="form-control" placeholder="Appartments, suite, unit etc ...">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>City <span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('city')}}" id="city" name="city" class="form-control" placeholder="Please Enter Your City..">
                                        <p></p>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>State <span class="text-danger">*</span></label>
                                        <input type="text" name="state" id="state" value="{{old('state')}}" class="form-control" placeholder="Please Enter Your State..">
                                      <p></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP <span class="text-danger">*</span></label>
                                        <input type="text" name="postcode" id="postcode" value="{{old('postcode')}}" class="form-control" placeholder="Please Enter Your Postcode / Zip..">
                                        <p></p>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control" placeholder="Please Enter Your Phone Number..">
                                        <p></p>
                                    </div>
                                </div>


                                <label>Email address <span class="text-danger">*</span></label>
                                <input type="text" name="email" id="email_address" value="{{old('email')}}" class="form-control" placeholder="Please Enter Your Email Address..">
                                <p></p>


                                 @if(empty(Auth::check()))
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="is_create" class="custom-control-input CreateAccount" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div>

                                <div id="ShowPassword" style="display: none">
                                    <label>Password</label>
                                    <input type="password" id="inputPassword" name="password" class="form-control " placeholder="Please Enter Paasowrd..">
                                </div>
                                @endif

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" name="note" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3>

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>


                                    @foreach (Cart::content() as $key => $item)
                                    @php
                                    $getCartProduct = getCartProduct($item->id);
                                      @endphp
                                    <tbody>
                                        <tr>
                                            <td><a href="{{url($getCartProduct->slug)}}">{{$getCartProduct->title}}</a></td>
                                            <td>${{number_format($item->price * $item->qty,2)}}</td>
                                        </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>${{Cart::subtotal()}}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">
                                                <div class="mt-1 cart-discount">
                                                        <div class="input-group">
                                                            <input type="text" id="getDiscountCode" name="discount_code" class="form-control"  placeholder="coupon code">
                                                            <div class="">
                                                                <button id="ApplyDiscount" class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                </div>
                                                <span id="success-message" class="text-success"></span>
                                                <span id="error-message" class="text-danger"></span>
                                            </td>


                                        </tr>

                                        <tr class="summary-discount">
                                            <td>Discount:</td>
                                            <td>$<span id="getDiscountAmount">0.00</span></td>
                                        </tr>

                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        @foreach ($getShipping as $shipping)
                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" value={{$shipping->id}} id="free-shipping{{$shipping->id}}" required name="shipping_id" class="custom-control-input getShippingCharge"
                                                     data-price={{!empty($shipping->price) ? $shipping->price : 0}}>
                                                    <label class="custom-control-label" for="free-shipping{{$shipping->id}}">{{$shipping->name}}</label>
                                                </div>
                                            </td>
                                            <td>
                                                @if (!empty($shipping->price))
                                                ${{number_format($shipping->price,2)}}
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$<span id="getPayableTotal">{{Cart::subtotal()}}</span></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <input type="hidden" id="getShippingChargeTotal" value="0">
                                <input type="hidden" id="PayableTotal" value="{{Cart::subtotal()}}">

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="cash" id="Cashondelivery" name="payment_method" class="custom-control-input" required>
                                            <label class="custom-control-label" for="Cashondelivery">Cash on delivery</label>
                                        </div>

                                        <div class="custom-control custom-radio" style="margin-top: 0">
                                            <input type="radio" value="paypal" id="PayPal" name="payment_method" class="custom-control-input" required>
                                            <label class="custom-control-label" for="PayPal">PayPal</label>
                                        </div>

                                        <div class="custom-control custom-radio" style="margin-top: 0">
                                            <input type="radio" value="stripe" id="CreditCard" name="payment_method" class="custom-control-input" required>
                                            <label class="custom-control-label" for="CreditCard">Credit Card (Stripe)</label>
                                        </div>

                                </div>


                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                                <img src="{{asset('assets/images/payments-summary.png')}}" alt="payments cards" class="mt-3">
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
<script>

    $('body').delegate("#ApplyDiscount", 'click', function(e) {
        e.preventDefault();
         var discount_code = $('#getDiscountCode').val();

         $.ajax({
             url: "{{route('ApplyDiscountCode')}}",
             type: "post",
             data: {
                "_token" : "{{csrf_token()}}",
                discount_code : discount_code
             },
             dataType: "json",
             success : function(data) {
                if(data.status == true) {
                $('#getDiscountAmount').html(data.discount_amount);

                var shipping =  $("#getShippingChargeTotal").val();

                var final_total = parseFloat(shipping) + parseFloat(data.payable_total);

                $('#getPayableTotal').html(final_total.toFixed(2));
                $('#PayableTotal').val(data.payable_total);
                $("#success-message").html(data.message).show();
                $("#error-message").html(data.message).hide();
                }else{
                    $("#error-message").html(data.message).show();
                    $("#success-message").html(data.message).hide();
                }

             }
         });
    });

//  Shipping charge ajax

    $('body').delegate(".getShippingCharge", 'click', function() {
       var price = $(this).attr('data-price');
       var total = $("#PayableTotal").val();
       $('#getShippingChargeTotal').val(price);
       var final_total = parseFloat(price) + parseFloat(total);
       $('#getPayableTotal').html(final_total.toFixed(2));



    });


    $('body').delegate(".CreateAccount","change",function() {
        if(this.checked) {
           $("#ShowPassword").show('slow');
           $("#inputPassword").prop('required',true);
        }else{
            $("#ShowPassword").hide('slow');
            $("#inputPassword").prop('required',false);
        }
    });



    $('body').delegate("#ShowForm","submit",function(e) {
          e.preventDefault();
          $.ajax({
              url:"{{route('PlaceOrder')}}",
              type: "post",
              data: new FormData(this),
              processData:false,
              contentType:false,
              dataType:"json",
              success:function(data) {
               if(data.status == false) {
                alert(data.message)
                if(data.errors['first_name']) {
                    $("#first_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['first_name']);
                  }else{
                    $("#first_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['last_name']) {
                    $("#last_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['last_name']);
                  }else{
                    $("#last_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['country']) {
                    $("#country").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['country']);
                  }else{
                    $("#country").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['city']) {
                    $("#city").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['city']);
                  }else{
                    $("#city").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['state']) {
                    $("#state").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['state']);
                  }else{
                    $("#state").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['postcode']) {
                    $("#postcode").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['postcode']);
                  }else{
                    $("#postcode").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['phone']) {
                    $("#phone").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['phone']);
                  }else{
                    $("#phone").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

                  if(data.errors['email']) {
                    $("#email_address").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(data.errors['email']);
                  }else{
                    $("#email_address").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                  }

               }else{
                $("#first_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#last_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#country").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#city").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#state").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#postcode").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#phone").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                $("#email_address").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                 window.location.href = data.redirect;
               }
              }
          });
    });












</script>

@endsection
