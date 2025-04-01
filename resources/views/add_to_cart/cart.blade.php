@extends('layouts.app')
@section('content')
<main class="main">
    <div class="mx-auto mt-4 col-lg-8">
     @include('alertMessage.alertMessage')
    </div>
    <div class="page-content">
        <div class="cart">
            <div class="container">
                @if(!empty(Cart::content()->count()))
                <div class="row">
                    <div class="col-lg-9">
                        <form action="{{route('CartUpdate')}}" method="post">
                            @csrf
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (Cart::content() as $key => $item)
                                @php
                                $getCartProduct = getCartProduct($item->id);

                                $getProductImage = getProductImageSingle($item->id);
                                  @endphp
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{asset('uploads/product/'.$getProductImage->image_name)}}" alt="{{$getCartProduct->title}}">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="{{url($getCartProduct->slug)}}">{{$getCartProduct->title}}</a>
                                            </h3>
                                        </div>
                                    </td>
                                    <td class="price-col">${{number_format($item->price,2)}}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" name="cart[{{$key}}][qty]" class="form-control" value="{{$item->qty}}" min="1" max="10" step="1" data-decimals="0" required>
                                        </div>

                                        <input type="hidden" name="cart[{{$key}}][id]" class="form-control" value="{{$item->id}}">
                                        <input type="hidden" name="cart[{{$key}}][rowId]]" class="form-control" value="{{$item->rowId}}">

                                    </td>
                                    <td class="total-col">${{number_format($item->price * $item->qty,2)}}</td>
                                    <td class="remove-col"><a href="{{route('CartDelete',$item->rowId)}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="cart-bottom">
                            <button class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                        </div>
                    </form>
                    </div>
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3>

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{Cart::subtotal()}}</td>
                                    </tr>

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{Cart::subtotal()}}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div>

                        <a href="{{route('home')}}" class="mb-3 btn btn-outline-dark-2 btn-block"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside>
                </div>
                @else
                 <p>Cart a Empty!</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
