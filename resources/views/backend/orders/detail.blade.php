@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Orders Detail</h1>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table">
                <tr>
                    <td><strong>Order Number(#) : </strong>{{$orders->order_number}} </td>
                </tr>
                        <tr>
                            <td><strong>Transaction Id : </strong>{{$orders->transaction_id}} </td>
                        </tr>
                        <tr>
                            <td><strong>Name : </strong> {{$orders->first_name}} {{$orders->last_name}}</td>
                        </tr>

                        <tr>
                            <td><strong>Mobile :</strong> {{$orders->phone}}</td>
                        </tr>

                        <tr>
                            <td><strong>Company Name :</strong> {{$orders->company_name}}</td>
                        </tr>

                        <tr>
                            <td><strong>Country :</strong> {{$orders->country}}</td>
                        </tr>
                        <tr>
                            <td><strong>Address : </strong>{{$orders->address_one}},{{$orders->address_two}}</td>
                        </tr>
                        <tr>
                            <td><strong>city : </strong>{{$orders->city}}</td>
                        </tr>
                        <tr>
                            <td><strong>State : </strong>{{$orders->state}}</td>
                        </tr>

                        <tr>
                            <td><strong>PostCode : </strong>{{$orders->postcode}}</td>
                        </tr>

                        <tr>
                            <td><strong>Discount Code : </strong>{{$orders->discount_code}}</td>
                        </tr>

                        <tr>
                            <td><strong>Discount Amount($) :</strong> ${{number_format($orders->discount_amount,2)}}</td>
                        </tr>
                        <tr>
                            <td><strong>Shipping Name :</strong> {{$orders->getShipping->name}}</td>
                        </tr>

                        <tr>
                            <td><strong>Shipping Amount($) :</strong> ${{number_format($orders->shipping_amount,2)}}</td>
                        </tr>

                        <tr>
                            <td><strong>Total Amount($) :</strong> ${{number_format($orders->total_amount,2)}}</td>
                        </tr>
                        <tr>
                            <td><strong>Payment Method :</strong> <span style="text-transform: capitalize">{{$orders->payment_method}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Status :</strong> @if ($orders->status == 0)
                                <span class="badge bg-secondary">Pending</span>
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
                            <td><strong>Created Date :</strong> {{\Carbon\Carbon::parse($orders->created_at)->format('d M,Y')}}</td>
                        </tr>




              </table>
              <!-- End Table with stripped rows -->


            </div>
          </div>

        </div>

       <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title">Orders List</h5>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Price($)</th>
                    <th>Size Name</th>
                    <th>Color Name</th>
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
                                <img src="{{asset('uploads/product/'.$getImage->image_name)}}" class="img-fluid" style="width: 100px">
                                @endif
                            </td>
                            <td><a href="{{url($item->getProduct->slug)}}" target="_blank">{{$item->getProduct->title}}</a></td>
                            <td>{{$item->quantity}}</td>
                            <td>${{number_format($item->price,2)}}</td>
                            <td>{{$item->size_name}}</td>
                            <td>{{$item->color_name}}</td>
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
    </section>

  </main>
@endsection
