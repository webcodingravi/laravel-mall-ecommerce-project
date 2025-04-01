@extends('layouts.app')
@section('content')
<main class="main">
    <div class="mx-auto mt-3 col-lg-8">
        @include('alertMessage.alertMessage')
       </div>
    <nav aria-label="breadcrumb" class="mb-0 border-0 breadcrumb-nav">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('ShowProduct',$getProductSingle->getCategory->slug)}}">{{$getProductSingle->getCategory->name}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('ShowProduct',$getProductSingle->getCategory->slug.'/'.$getProductSingle->getSubCategory->slug)}}">{{$getProductSingle->getSubCategory->name}}</a></li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                @php
                                    $getProductImage = getProductImageSingle($getProductSingle->id);
                                @endphp
                                @if (!empty($getProductImage))
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{asset('uploads/product/'.$getProductImage->image_name)}}" data-zoom-image="{{asset('uploads/product/'.$getProductImage->image_name)}}" alt="">
                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure>
                                @endif

                                <div id="product-zoom-gallery" class="product-image-gallery" style="max-height: 200px; object-fit:cover;">
                                    @foreach ($getProductSingle->getImage as $getImage)
                                    <a class="product-gallery-item active" href="#" data-image="{{asset('uploads/product/'.$getImage->image_name)}}" data-zoom-image="{{asset('uploads/product/'.$getImage->image_name)}}">
                                        <img src="{{asset('uploads/product/'.$getImage->image_name)}}" alt="">
                                    </a>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$getProductSingle->title}}</h1>

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div>

                            <div class="product-price">
                                $<span id="getTotalPrice">{{number_format($getProductSingle->price,2)}}</span>

                            </div>

                            <div class="product-content">
                                {!!$getProductSingle->short_description!!}
                            </div>

                            <form action="{{route('AddToCart')}}" method="post">
                                @csrf
                            <input type="hidden" name="product_id" value="{{$getProductSingle->id}}">
                            @if (!empty($getProductSingle->getColor->count()))
                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>
                                <div class="select-custom">
                                    <select name="color_id" id="color_id" class="form-control">
                                        <option value="">Select a Color..</option>
                                        @foreach ($getProductSingle->getColor as $color)
                                        <option value="{{$color->getColor->id}}">{{$color->getColor->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            @endif

                            @if (!empty($getProductSingle->getSize->count()))
                            <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="size_id" id="size_id" class="form-control getSizePrice">
                                        <option data-price="0" value="#">Select a size</option>
                                        @foreach ($getProductSingle->getSize as $getSize)
                                        <option data-price={{!empty($getSize->price) ? $getSize->price : 0}} value="{{$getSize->id}}">{{$getSize->size}} (${{!empty($getSize->price) ? number_format($getSize->price,2) : ''}} )</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            @endif

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                </div>
                            </div>

                            <div class="mt-3 product-details-action">
                                <button type="submit" class="btn-product btn-cart" style="background: white; color:#c96">Add to cart</button>
                                <div class="details-action-wrapper">
                                    @if (!empty(Auth::check()))
                                    <a href="javascript:void(0);" class="btn-product btn-wishlist add_to_wishlist add_to_wishlist{{$getProductSingle->id}}
                                         {{!empty(CheckWishlist($getProductSingle->id)) ? 'btn-wishlist-add' : ''}}" id="{{$getProductSingle->id}}" title="Wishlist"><span>Add to Wishlist</span></a>
                                    @else
                                    <a href="#signin-modal" class="btn-product btn-wishlist" data-toggle="modal"><span>Add to Wishlist</span></a>
                                    @endif

                                </div>
                            </div>
                        </form>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="{{route('ShowProduct',$getProductSingle->getCategory->slug)}}">{{$getProductSingle->getCategory->name}}</a>,
                                    <a href="{{route('ShowProduct',$getProductSingle->getCategory->slug.'/'.$getProductSingle->getSubCategory->slug)}}">{{$getProductSingle->getSubCategory->name}}</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link" style="margin-top: 20px">
                        <div class="product-desc-content">
                            {!!$getProductSingle->description!!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link" style="margin-top: 20px">
                        <div class="product-desc-content">
                            {!!$getProductSingle->additional_information!!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link" style="margin-top: 20px">
                        <div class="product-desc-content">
                            {!!$getProductSingle->shipping_returns!!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                        <span class="review-date">6 days ago</span>
                                    </div>
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div>

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                            </div>
                                        </div>
                                        <span class="review-date">5 days ago</span>
                                    </div>
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div>

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="mb-4 text-center title">You May Also Like</h2>

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>



                @foreach ($getRelatedProduct as $product)
                @php
                    $productImg = getProductImageSingle($product->id);
                @endphp
                <div class="text-center product product-7">
                            <figure class="product-media">

                                @if (!empty($productImg->image_name))
                                <a href="{{url($product->slug)}}">
                                    <img src="{{asset('uploads/product/'.$productImg->image_name)}}" alt="{{$product->title}}" class="product-image" style="height:300px; width:100%; object-fit:cover;">
                                </a>
                                @endif
                                <div class="product-action-vertical">
                                    @if (!empty(Auth::check()))
                                    <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{$product->id}}
                                         {{!empty(CheckWishlist($product->id)) ? 'btn-wishlist-add' : ''}}" id="{{$product->id}}" title="Wishlist"><span>Add to Wishlist</span></a>
                                    @else
                                    <a href="#signin-modal" class="btn-product-icon btn-wishlist btn-expandable" data-toggle="modal"><span>Add to Wishlist</span></a>
                                    @endif


                                </div>

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div>
                            </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="{{route('ShowProduct',$product->category_slug.'/'.$product->SubCategory_slug)}}">{{$product->SubCategory_name}}</a>
                        </div>
                        <h3 class="product-title"><a href="{{url($product->slug)}}">{{$product->title}}</a></h3>
                        <div class="product-price">
                            ${{number_format($product->price,2)}}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div>
                            </div>
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div>


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
<script>
    $(".getSizePrice").change(function() {
        var product_price = '{{$getProductSingle->price}}';
         var price = $('option:selected',this).attr('data-price');
         var total = parseFloat(product_price) + parseFloat(price);
         $("#getTotalPrice").html(total.toFixed(2));

    });

    $('body').delegate('.add_to_wishlist','click',function() {
         var product_id = $(this).attr('id');
         $.ajax({
           type: 'post',
           url: '{{route("AddToWishlist")}}',
           data: {
                 "_token" : "{{csrf_token()}}",
                 product_id : product_id
           },
           dataType:'json',
           success:function(data){
               if(data.is_wishlist == 0) {
                    $('.add_to_wishlist'+product_id).removeClass('btn-wishlist-add');
               }else{
                    $('.add_to_wishlist'+product_id).addClass('btn-wishlist-add');
               }
           }

         });
    });



</script>
@endsection
