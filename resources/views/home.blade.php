@extends('layouts.app')
@section('content')
<main class="main">

    <div class="pt-0 pb-6 intro-section bg-lighter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-2 intro-slider-container slider-container-ratio slider-container-1 mb-lg-0">
                        <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                "nav": false,
                                "responsive": {
                                    "768": {
                                        "nav": true
                                    }
                                }
                            }'>

                            @foreach ($getSlider as $slider)
                            <div class="intro-slide">
                                @if (!empty($slider->image_name))
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="{{asset('uploads/slider/'.$slider->image_name)}}">
                                        <img src="{{asset('uploads/slider/'.$slider->image_name)}}" alt="Image Desc">
                                    </picture>
                                </figure>
                                @endif

                                <div class="intro-content">
                                    <h1 class="intro-title">{!!$slider->title!!}</h1>
                                    @if (!empty($slider->button_link) && !empty($slider->button_name))
                                    <a href="{{$slider->button_link}}" class="btn btn-outline-white">
                                        <span class="text-uppercase">{{$slider->button_name}}</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>

                            @endforeach


                        </div>

                        <span class="slider-loader"></span>
                    </div>
                </div>


            </div>

            <div class="mb-6"></div>

            <div class="owl-carousel owl-simple" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        }
                    }
                }'>

                @foreach ($getPartner as $partner)
                @if (!empty($partner->image_name))
                <a href="{{!empty($partner->link) ? $partner->link : ''}}" class="brand">
                    <img src="{{asset('uploads/partner_logo/'.$partner->image_name)}}" alt="{{$partner->image_name}}">
                </a>
                @endif
                @endforeach

            </div>
        </div>
    </div>

    <div class="mb-6"></div>

    @if (!empty($getProductTrendy->count()))
    <div class="container">
        <div class="mb-3 heading heading-center">
            <h2 class="title-lg">Trendy Products</h2>
        </div>


        <div class="tab-content tab-content-carousel">
            <div class="p-0 tab-pane fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
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

            @foreach ($getProductTrendy as $product)
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
                        {{!empty(CheckWishlist($product->id)) ? 'btn-wishlist-add' : ''}}" id="{{$product->id}}"><span>Add to Wishlist</span></a>
                        @else
                        <a href="#signin-modal" class="btn-product-icon btn-wishlist btn-expandable" data-toggle="modal"><span>Add to Wishlist</span></a>
                        @endif

                    </div>

                    <div class="product-action">
                        <a href="{{url($product->slug)}}" class="btn-product btn-cart"><span>add to cart</span></a>
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
                            <div class="ratings-val" style="width: {{getReviewRating($product->id)}}%;"></div>
                        </div>
                        @if ($product->getTotalReview() <= 1)
                        <span class="ratings-text">
                            Review ({{$product->getTotalReview()}})
                            </span>
                            @else
                            <span class="ratings-text">
                                Reviews ({{$product->getTotalReview()}})
                        </span>
                            @endif

                    </div>
                </div>
            </div>
        @endforeach
                </div>
            </div>
        </div>
    </div>
      @endif

    @if (!empty($getCategoryHome->count()))
    <div class="container pt-6 categories">
        <h2 class="mb-4 text-center title-lg">Shop by Categories</h2>
        <div class="row">
            @foreach ($getCategoryHome as $categoryHome)
            <div class="col-6 col-lg-4">
                <div class="banner banner-display banner-link-anim">
                    @if (!empty($categoryHome->image_name))
                    <a href="{{url($categoryHome->slug)}}">
                        <img src="{{asset('uploads/category/'.$categoryHome->image_name)}}" alt="{{$categoryHome->image_name}}">
                    </a>
                    @endif
                    <div class="banner-content banner-content-center">
                        <h3 class="text-white banner-title"><a href="{{url($categoryHome->slug)}}">{{$categoryHome->name}}</a></h3>
                        @if (!empty($categoryHome->button_name))
                        <a href="{{url($categoryHome->slug)}}" class="btn btn-outline-white banner-link">{{$categoryHome->button_name}}<i class="icon-long-arrow-right"></i></a>

                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    @endif

    <div class="mb-5"></div>


    <div class="container">
        <div class="mb-6 heading heading-center">
            <h2 class="title">Recent Arrivals</h2>

            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                </li>
                @foreach ($getCategoryHome as $categoryHome)
                <li class="nav-item">
                    <a class="nav-link getCategoryProduct" data-val="{{$categoryHome->id}}" id="top-{{$categoryHome->slug}}-link" data-toggle="tab" href="#top-{{$categoryHome->slug}}-tab" role="tab" aria-controls="top-{{$categoryHome->slug}}-tab" aria-selected="false">{{$categoryHome->name}}</a>
                </li>
                @endforeach


            </ul>
        </div>

        <div class="tab-content">
            <div class="p-0 tab-pane fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                <div class="products">
                     @php
                         $is_home = 1;
                     @endphp
                        @foreach ($getProduct as $product)
                        @include('product.list')

                        @endforeach

                    </div>
                    <div class="text-center more-container">
                        <a href="{{route('getProductSearch')}}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                    </div>

                </div>



            @foreach ($getCategoryHome as $categoryHome)
            <div class="p-0 tab-pane fade getCategoryProduct{{$categoryHome->id}}" id="top-{{$categoryHome->slug}}-tab" role="tabpanel" aria-labelledby="top-{{$categoryHome->slug}}-link">

            </div>
            @endforeach

    </div>
</div>

    <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="text-center icon-box icon-box-card">
                    <span class="icon-box-icon">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Payment & Delivery</h3>
                        <p>Free shipping for orders over $50</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="text-center icon-box icon-box-card">
                    <span class="icon-box-icon">
                        <i class="icon-rotate-left"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                        <p>Free 100% money back guarantee</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="text-center icon-box icon-box-card">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                        <p>Alway online feedback 24/7</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->
    </div><!-- End .container -->
    <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
        <div class="container">
           <h2 class="mb-3 text-center title-lg mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->

            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "items": 3,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":3
                        }
                    }
                }'>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/home/post-1.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="pb-4 text-center entry-body">
                        <div class="entry-meta">
                            <a href="#">Nov 22, 2018</a>, 0 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Sed adipiscing ornare.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.<br>Pelletesque aliquet nibh necurna. </p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/home/post-2.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="pb-4 text-center entry-body">
                        <div class="entry-meta">
                            <a href="#">Dec 12, 2018</a>, 0 Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="single.html">Fusce lacinia arcuet nulla.</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis justo. </p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="single.html">
                            <img src="assets/images/blog/home/post-3.jpg" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="pb-4 text-center entry-body">
                        <div class="entry-meta">
                            <a href="#">Dec 19, 2018</a>, 2 Comments
                        </div>

                        <h3 class="entry-title">
                            <a href="single.html">Quisque volutpat mattis eros.</a>
                        </h3>

                        <div class="entry-content">
                            <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>
                            <a href="single.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <div class="mt-3 mb-0 text-center more-container">
            <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
        </div>
    </div>

</main>

@endsection

@section('script')
<script>
$('body').delegate('.getCategoryProduct','click',function() {
   var category_id = $(this).attr('data-val');
   $.ajax({
      url: "{{route('ArrivalProduct')}}",
      type: "POST",
      data: {
        "_token" : "{{csrf_token()}}",
        category_id:category_id,
      },
      dataType:"json",
      success:function(response) {
        $(".getCategoryProduct"+category_id).html(response.success);
      }
   });
})
</script>

@endsection
