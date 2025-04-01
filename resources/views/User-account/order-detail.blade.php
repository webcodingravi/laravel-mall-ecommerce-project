@extends('layouts.app')
@section('content')
<main class="main">
    <div class="text-center page-header" style="background-image: url({{asset('assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">{{$meta_title}}</h1>
        </div>
    </div>

    <div class="mt-5 page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('User-account._sidebar')

                    <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                       <!-- Table with stripped rows -->
              <table class="table table-striped">
                <tr>
                    <td style="padding: 10px">
                        <strong>Order Number(#) : </strong>{{$orders->order_number}}
                     </td>
                   </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Name : </strong> {{$orders->first_name}} {{$orders->last_name}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Mobile :</strong> {{$orders->phone}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Company Name :</strong> {{$orders->company_name}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Country :</strong> {{$orders->country}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px">
                                <strong>Address : </strong>{{$orders->address_one}},{{$orders->address_two}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px">
                                <strong>city : </strong>{{$orders->city}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px">
                                <strong>State : </strong>{{$orders->state}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>PostCode : </strong>{{$orders->postcode}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Discount Code : </strong>{{$orders->discount_code}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Discount Amount($) :</strong> ${{number_format($orders->discount_amount,2)}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px">
                                <strong>Shipping Name :</strong> {{$orders->getShipping->name}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Shipping Amount($) :</strong> ${{number_format($orders->shipping_amount,2)}}
                            </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Total Amount($) :</strong> ${{number_format($orders->total_amount,2)}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px">
                                <strong>Payment Method :</strong> <span style="text-transform: capitalize">{{$orders->payment_method}}</span>
                            </td>
                        </tr>
                        <tr>
                    <td style="padding: 10px"><strong>Status :</strong> @if ($orders->status == 0)
                        <span class="badge bg-warning">Pending</span>
                        @elseif ($orders->status == 1)
                        <span class="badge bg-warning">In Progress</span>

                        @elseif ($orders->status == 2)
                        <span class="badge bg-success">Delivered</span>

                        @elseif ($orders->status == 3)
                        <span class="badge bg-success">Completed</span>

                        @elseif ($orders->status == 4)
                        <span class="badge bg-danger">Cancelled</span>
                        @endif
                        </td>
                        </tr>

                        <tr>
                            <td style="padding: 10px">
                                <strong>Created Date :</strong> {{\Carbon\Carbon::parse($orders->created_at)->format('d M,Y')}}
                            </td>
                        </tr>
              </table>

              <!-- End Table with stripped rows -->

                <h5 class="mb-2 card-title">Product Details</h5>
                <!-- Table with stripped rows -->
                <table class="table text-center table-striped table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Price($)</th>

                      <th>Size Amount($)</th>
                      <th>Total Amount($)</th>

                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($orders->getItem as $item)
                        @php
                            $getImage = getProductImageSingle($item->product_id);
                        @endphp
                          <tr>
                              <td>
                                  @if ($getImage->image_name != '')
                                  <img src="{{asset('uploads/product/'.$getImage->image_name)}}" class="img-fluid" style="width: 100px; padding-left:10px; cursor: pointer;">
                                  @endif
                              </td>
                              <td><a href="{{url($item->getProduct->slug)}}" target="_blank">{{$item->getProduct->title}}</a></td>
                              <td>{{$item->quantity}}</td>
                              <td>${{number_format($item->price,2)}}</td>
                              <td>${{number_format($item->size_amount,2)}}</td>
                              <td>${{number_format($item->total_price,2)}}</td>
                          </tr>
                      @endforeach

                  </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
</div>
</div>
</main>
@endsection
