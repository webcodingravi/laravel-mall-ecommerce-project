@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">

    <div class="pagetitle">
      <h1>Dashboard</h1>
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
                          <h6>{{$TotalOrder}}</h6>
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
                              <h6>{{$TotalTodayOrder}}</h6>
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
                          <h6>${{number_format($TotalAmount,2)}}</h6>
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
                              <h6>${{number_format($TotalTodayAmount,2)}}</h6>
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
                                  <h6>{{$TotalCustomer}}</h6>
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
                                      <h6>{{$TotalTodayCustomer}}</h6>
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
                            <h5 class="card-title">Sales</h5>

                            <!-- Bar Chart -->
                            <div id="sales_chart_orders"
                            style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
                             class="echart" _echarts_instance_="ec_1742897886050">
                             <div style="position: relative; width: 451px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;">
                                <canvas data-zr-dom-id="zr_0" width="451" height="400"
                                 style="position: absolute; left: 0px; top: 0px; width: 451px; height: 400px; user-select: none;
                                  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                                 padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                 </div>
                                </div>

                            <script>
                              document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#sales_chart_orders")).setOption({
                                  xAxis: {
                                    type: 'category',
                                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                                  },
                                  yAxis: {
                                    type: 'value'
                                  },
                                  series: [{
                                    data: [120, 200, 150, 80, 70, 110, 130],
                                    type: 'bar'
                                  }]
                                });
                              });
                            </script>
                            <!-- End Bar Chart -->

                          </div>
                        </div>
                      </div>



                    {{-- latest product --}}
                    <div class="col-lg-12">
                        <div class="overflow-auto card top-selling" style="overflow: auto; border-radius:none;">
                            <div class="p-0 card-body">
                                  <!-- Table with stripped rows -->
                                  <table class="table table-striped table-bordered">
                                    <thead>
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

                                        <td><a href="{{route('orders.details',$order->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> </a>
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
