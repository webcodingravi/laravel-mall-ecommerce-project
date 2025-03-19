<div class="mb-3 products">
    <div class="row justify-content-center">
        @foreach ($getProduct as $product)
        @php
            $productImg = getProductImageSingle($product->id);
        @endphp
        <div class="col-12 col-md-4 col-lg-4">
            <div class="text-center product product-7">
                <figure class="product-media">
                    @if (!empty($productImg->image_name))
                    <a href="{{url($product->slug)}}">
                        <img src="{{asset('uploads/product/'.$productImg->image_name)}}" alt="{{$product->title}}" class="product-image" style="height:300px; width:100%; object-fit:cover;">
                    </a>
                    @endif
                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
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
                            <div class="ratings-val" style="width: 20%;"></div>
                        </div>
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


