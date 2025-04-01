@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">

    <div class="pagetitle">
      <h1 style="color: #cc9966;">Dashboard</h1>
    </div>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-2 col-md-4">
                <div class="card info-card sales-card">
                    <div class="pt-4 card-body">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                          <h6 style="color: #cc9966;">{{$TotalOrder}}</h6>
                          <span class="pt-2 text-muted small ps-1">Total Orders</span>

                        </div>
                      </div>
                    </div>

                  </div>
                 </div>

                 <div class="col-xxl-2 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="pt-4 card-body">
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                              <h6 style="color: #cc9966;">{{$TotalTodayOrder}}</h6>
                              <span class="pt-2 text-muted small ps-1">Today Orders</span>

                            </div>
                          </div>
                        </div>

                      </div>
                     </div>


            <div class="col-xxl-2 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="pt-4 card-body">
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6 style="color: #cc9966;">${{number_format($TotalAmount,2)}}</h6>
                          <span class="pt-2 text-muted small ps-1">Total Payment</span>

                        </div>
                      </div>
                    </div>
                  </div>
                  </div>


                  <div class="col-xxl-2 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="pt-4 card-body">
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                              <h6 style="color: #cc9966;">${{number_format($TotalTodayAmount,2)}}</h6>
                              <span class="pt-2 text-muted small ps-1">Today Payment</span>

                            </div>
                          </div>
                        </div>
                      </div>
                      </div>

                      <div class="col-xxl-2 col-md-4">
                        <div class="card info-card customers-card">
                            <div class="pt-4 card-body">
                              <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                  <h6 style="color: #cc9966;">{{$TotalCustomer}}</h6>
                                  <span class="pt-2 text-muted small ps-1">Total Customer</span>

                                </div>
                              </div>
                            </div>

                          </div>
                        </div>


                        <div class="col-xxl-2 col-md-4">
                            <div class="card info-card customers-card">
                                <div class="pt-4 card-body">
                                  <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                      <h6 style="color: #cc9966;">{{$TotalTodayCustomer}}</h6>
                                      <span class="pt-2 text-muted small ps-1">Today Customer</span>

                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                    </div>
                    </div>


                     {{-- chart section --}}
                     <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">

                            <div class="d-flex justify-content-between">
                            <h5 class="card-title" style="color: #cc9966;">Sales</h5>
                            <select name="" id="" class="mt-4 form-select ChangeYear" style="width: 150px">
                                @for ($i = 2024; $i<=date('Y'); $i++)
                                <option {{($year == $i) ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                @endfor

                            </select>
                        </div>
                            <h5 style="color: #cc9966;">${{number_format($totalAmount,2)}}</h5>
                            <span style="color: #cc9966;">Sale Our Time</span>

                            <!-- Column Chart -->
                            <div id="columnChart"></div>

                            <script>
                              document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#columnChart"), {
                                  series: [{
                                    name: 'Customer',
                                    data: [{{$getTotalCustomerMonth}}]
                                  }, {
                                    name: 'Order',
                                    data: [{{$getTotalOrderMonth}}]
                                  }, {
                                    name: 'Amount',
                                    data: [{{$getTotalOrderAmountMonth}}]
                                  }],
                                  chart: {
                                    type: 'bar',
                                    height: 350
                                  },
                                  plotOptions: {
                                    bar: {
                                      horizontal: false,
                                      columnWidth: '55%',
                                      endingShape: 'rounded'
                                    },
                                  },
                                  dataLabels: {
                                    enabled: false
                                  },
                                  stroke: {
                                    show: true,
                                    width: 2,
                                    colors: ['transparent']
                                  },
                                  xaxis: {
                                    categories: ['January', 'February','March','April', 'May', 'June', 'July', 'August','September', 'October','November','December' ],
                                  },
                                  yaxis: {
                                    title: {
                                      text: '($)'
                                    }
                                  },
                                  fill: {
                                    opacity: 1
                                  },
                                  tooltip: {
                                    y: {
                                      formatter: function(val) {
                                        return "$ " + val + ""
                                      }
                                    }
                                  }
                                }).render();
                              });
                            </script>
                            <!-- End Column Chart -->

                          </div>
                        </div>
                      </div>


                    {{-- latest product --}}
                    <div class="col-lg-12">
                        <div class="overflow-auto card top-selling" style="overflow: auto; border-radius:none;">
                            <div class="card-body">
                                  <!-- Table with stripped rows -->
                                  <table class="table mt-4 table-striped table-bordered">
                                    <thead class="border table-light">
                                      <tr>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>State</th>
                                        <th>PostCode</th>
                                        <th>Discount Code</th>
                                        <th>Discount Amount($)</th>
                                        <th>Shipping Amount($)</th>
                                        <th>Total Amount($)</th>
                                        <th>Payment Method</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @if ($getLatestOrders->isNotEmpty())
                                    @foreach ($getLatestOrders as $order)
                                      <tr>
                                        <td>{{$order->order_number}}</td>
                                        <td>{{$order->first_name}} {{$order->last_name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->country}}</td>
                                        <td>{{$order->address_one}} <br> {{$order->address_one}}</td>
                                        <td>{{$order->state}}</td>
                                        <td>{{$order->postcode}}</td>
                                        <td>{{$order->discount_code}}</td>
                                        <td>{{number_format($order->discount_amount,2)}}</td>
                                        <td>{{number_format($order->shipping_amount,2)}}</td>
                                        <td>{{number_format($order->total_amount,2)}}</td>
                                        <td style="text-transform: capitalize">{{$order->payment_method}}</td>
                                        <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M,Y')}}</td>

                                        <td><a href="{{route('orders.details',$order->id)}}" class="btn btn-primary btn-sm" style="background: #cc9966; border:none"><i class="bi bi-eye"></i> </a>
                                        </td>

                                      </tr>
                                       @endforeach
                                    @else
                                    <tr>
                                     <td colspan="7">No Record Found.</td>
                                    </tr>
                                     @endif
                                    </tbody>
                                  </table>
                                  <!-- End Table with stripped rows -->


                                </div>

                        </div>
                      </div>


            </div>
            </section>

        </main>

        @endsection
        @section('script')
        <script>
            $('.ChangeYear').change(function() {
                var year = $(this).val();
                window.location.href="{{route('dashboard','year=')}}"+year;
            })
        </script>

        @endsection
