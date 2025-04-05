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

            <h1 class="page-title">Wishlist</h1>

        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="mb-2 breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>

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
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->


                    </div>
                     <div id="getProductAjax">
                        {{-- @include('product.list') --}}
                     </div>

                    <div class="pagination">

                    </div>
                </div>


            </div>
        </div>
    </div>
</main>

@endsection





