<div class="products">
    @php
        $is_home = 1;
    @endphp
       @foreach ($getProduct as $product)
       @include('product.list')

       @endforeach

   </div>
   <div class="text-center more-container">
       <a href="{{url($getCategory->slug)}}" class="btn btn-outline-darker btn-more"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
   </div>
