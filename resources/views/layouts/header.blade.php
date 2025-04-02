<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">

                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                            @if(Auth::check())
                            <li><a href="route('MyWishlist')"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>
                             @else
                             <li><a href="#signin-modal"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>
                            @endif
                            <li><a href="wishlist.html"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            @if (!empty(Auth::check()))
                            <li><a href="{{route('user_dashboard')}}"><i class="icon-user"></i>{{Auth::user()->name}}</a></li>
                                @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="logo" width="105" height="25">
                </a>


                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{route('home')}}" class="">Home</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Shop</a>
                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                               @foreach (getCategoryHeader() as $category)
                                               @if (!empty($category->getHeaderSubCategory->count()))
                                                <div class="mb-2 col-md-4">
                                                    <a href="{{route('ShowProduct',$category->slug)}}" class="menu-title">{{$category->name}}</a>
                                                    <ul>
                                                        @foreach ($category->getHeaderSubCategory as $SubCategory)
                                                        <li>
                                                            <a href="{{route('ShowProduct',$category->slug.'/'.$SubCategory->slug)}}">{{$SubCategory->name}}</a>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                            </div>
                                            @endif
                                            @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="{{route('getProductSearch')}}" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q"  value="{{!empty(Request::get('q')) ? Request::get('q') : ''}}" placeholder="Search in..." required>
                        </div>
                    </form>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>
                     @if (!empty(Cart::content()->count()))
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @foreach (Cart::content() as $item)
                            @php
                                $getCartProduct = getCartProduct($item->id);

                                $getProductImage = getProductImageSingle($item->id);
                            @endphp
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="{{url($getCartProduct->slug)}}">{{$getCartProduct->title}}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{$item->qty}}</span>
                                        x ${{number_format($item->price,2)}}
                                    </span>
                                </div>

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="{{asset('uploads/product/'.$getProductImage->image_name)}}" alt="product">
                                    </a>
                                </figure>
                                <a href="{{route('CartDelete',$item->rowId)}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div>
                            @endforeach
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">${{Cart::subtotal()}}</span>
                        </div>

                        <div class="dropdown-cart-action">
                            <a href="{{route('cart')}}" class="btn btn-primary">View Cart</a>
                            <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</header>
