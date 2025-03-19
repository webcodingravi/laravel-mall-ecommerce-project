@extends('layouts.app')
@section('style')
<style>
    .active-color {
        border: 3px solid #000!important;
    }
</style>
@endsection
@section('content')
<main class="main">
    <div class="text-center page-header" style="background-image: url('{{asset('assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            @if (!empty($getSubCategory->name))
            <h1 class="page-title">{{$getSubCategory->name}}</h1>
            @elseif (!empty($getCategory))
            <h1 class="page-title">{{$getCategory->name}}</h1>
            @else
            <h1 class="page-title">Search for {{Request::get('q')}}</h1>
            @endif

        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="mb-2 breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                @if (!empty($getSubCategory))
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('ShowProduct',$getCategory->slug)}}">{{$getCategory->name}}</a></li>
                <li class="breadcrumb-item active" >{{$getSubCategory->name}}</li>
                @elseif(!empty($getCategory))
                <li class="breadcrumb-item active" aria-current="page">{{$getCategory->name}}</li>
                @endif
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>{{$getProduct->perPage()}} of {{$getProduct->total()}}</span> Products
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control ChangeSortBy">
                                        <option value="">Select...</option>
                                        <option value="popularity">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                     <div id="getProductAjax">
                        @include('product.list')
                     </div>

                    <div style="text-align: center;">
                        <a href="javascript:;" @if(empty($page)) style="display: none;" @endif data-page="{{$page}}" class="btn btn-primary LoadMore">Load More</a>
                    </div>
                </div>

                <!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <form method="post" id="FilterForm" action="">
                        @csrf
                        <input type="hidden" name="q" value="{{!empty(Request::get('q')) ? Request::get('q') : ''}}">
                        <input type="hidden" name="old_sub_category_id" value="{{!empty($getSubCategory) ? $getSubCategory->id : ''}}">
                        <input type="hidden" name="old_category_id" value="{{!empty($getCategory) ? $getCategory->id : ''}}">
                        <input type="hidden" name="sub_category_id" id="sub_category_id">
                        <input type="hidden" name="brand_id" id="get_brand_id">
                        <input type="hidden" name="color_id" id="get_color_id">
                        <input type="hidden" name="sort_by_id" id="get_sort_by_id">
                        <input type="hidden" name="start_price" id="get_start_price">
                        <input type="hidden" name="end_price" id="get_end_price">
                    </form>
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="{{route('ShowProduct')}}" class="sidebar-filter-clear">Clean All</a>
                        </div>

                        @if (!empty($getSubCategoryFilter))
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3>
                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                       @foreach ($getSubCategoryFilter as $SubCategory)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" {{Request::get('category_id') ? 'checked' : ''}} name="category_id" value="{{$SubCategory->id}}" class="custom-control-input ChangeCategory" id="cat-{{$SubCategory->id}}">
                                                <label class="custom-control-label" for="cat-{{$SubCategory->id}}">{{$SubCategory->name}}</label>
                                            </div>
                                            <span class="item-count">{{$SubCategory->TotalProduct()}}</span>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        @foreach ($getColor as $color)
                                        <a href="javascript:;" id="{{$color->id}}" data-val="0" class="ChangeColor" style="background: {{$color->code}};">
                                            <span class="sr-only">{{$color->name}}</span>
                                        </a>

                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3>

                            @if ($getBrand->isNotEmpty())
                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    @foreach ($getBrand as $brand)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value={{$brand->id}} class="custom-control-input ChangeBrand" id="brand-{{$brand->id}}">
                                                <label class="custom-control-label" for="brand-{{$brand->id}}">{{$brand->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div>

                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
    <script>
        $('.ChangeSortBy').change(function() {
             var id = $(this).val();
             $("#get_sort_by_id").val(id);
             FilterForm();

        });

        $('.ChangeCategory').change(function() {
            var ids = '';
           $('.ChangeCategory').each(function() {
            if(this.checked) {
                var id = $(this).val();
                ids += id+',';
            }
           });
           $("#sub_category_id").val(ids);
           FilterForm();

        });

        // Brand filter
        $('.ChangeBrand').change(function() {
            var ids = '';
            $('.ChangeBrand').each(function() {
               if(this.checked) {
                var id = $(this).val();
                ids += id+',';
               }
            });
             $("#get_brand_id").val(ids);
             FilterForm();

        });

          // Color filter
        $('.ChangeColor').click(function() {
            var id = $(this).attr('id');
            var status = $(this).attr('data-val');
            if(status == 0) {
                $(this).attr('data-val',1)
                $(this).addClass('active-color');
            }else{
                $(this).attr('data-val',0)
                $(this).removeClass('active-color');
            }


            var ids = '';
            $('.ChangeColor').each(function() {
                var status = $(this).attr('data-val');

               if(status == 1) {
                var id = $(this).attr('id');
                ids += id+',';
               }
            });
            $("#get_color_id").val(ids);
            FilterForm();

        });

        var xhr;
        function FilterForm() {
            if(xhr && xhr.readyState != 4) {
               xhr.abort();
            }
             xhr = $.ajax({
                  url : "{{route('FilterProduct')}}",
                  type: "post",
                  data: $('#FilterForm').serialize(),
                  dataType: "json",
                  success: function(data) {
                    $("#getProductAjax").html(data.success);
                  }

              });
        }

        $('body').delegate('.LoadMore','click',function() {
             var page = $(this).attr('data-page');
             $('.LoadMore').html('Loading...');
             if(xhr && xhr.readyState != 4) {
               xhr.abort();
            }
             xhr = $.ajax({
                  url : "{{route('FilterProduct')}}?page="+page,
                  type: "post",
                  data: $('#FilterForm').serialize(),
                  dataType: "json",
                  success: function(data) {
                    $("#getProductAjax").append(data.success);
                    $('.LoadMore').attr('data-page',data.page);
                    $('.LoadMore').html('Load More');

                    if(data.page == 0) {
                        $('.LoadMore').hide();
                    }else{
                        $('.LoadMore').show();
                    }
                  }

              });
        })

   var i = 0;
    if ( typeof noUiSlider === 'object' ) {
		var priceSlider  = document.getElementById('price-slider');
		noUiSlider.create(priceSlider, {
			start: [ 0, 9999 ],
			connect: true,
			step: 1,
			margin: 1,
			range: {
				'min': 0,
				'max': 9999
			},
			tooltips: true,
			format: wNumb({
		        decimals: 0,
		        prefix: '$'
		    })
		});

		// Update Price Range
		priceSlider.noUiSlider.on('update', function( values, handle ){
            var start_price = values[0];
            var end_price = values[1];
            $('#get_start_price').val(start_price);
            $('#get_end_price').val(end_price);
			$('#filter-price-range').text(values.join(' - '));
            if(i == 0 || i == 1) {
                  i++;
            }else{
                FilterForm();
            }

		});


	}

    </script>


@endsection

