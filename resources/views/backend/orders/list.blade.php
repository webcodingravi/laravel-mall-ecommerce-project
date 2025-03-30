@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">

    <div class="pagetitle d-flex justify-content-between">
      <h1>Orders List (Total: {{$orders->total()}})</h1>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="{{route('orders.list')}}">
          <input type="text" name="query" value="{{Request::get('query')}}" placeholder="Search" class="form-control" title="Enter search keyword" style="border-radius:0">
          <button type="submit" class="btn btn-primary" title="Search" style="border-radius:0"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>


    <div class="mb-3 section">
        <div class="row">
            <form action="" method="get">
            <div class="gap-3 px-3 py-3 bg-white col-md-12 d-flex align-items-center">
                <div class="form-group">
                    <label for="" class="mb-1">From Date</label>
                     <input type="date" value="{{Request::get('from')}}"  name="from" class="form-control" style="border-radius: 0">
                </div>
                <div class="form-group">
                    <label for="" class="mb-1">To Date</label>
                     <input type="date" value="{{Request::get('to')}}"  name="to" class="form-control" style="border-radius: 0">

                </div>
                <button type="submit" class="mt-4 btn btn-primary" style="border-radius: 0">Search</button>

            </div>
        </form>

        </div>
    </div>


    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="card" style="overflow: hidden">

            <div class="card-body" style="overflow: auto">
            <div class="d-flex align-items-center justify-content-between">
              <h5 class="card-title">Orders List <a class="btn btn-primary btn-sm"  href="{{route('orders.list')}}"><i class="bi bi-arrow-clockwise"></i> Reset</a></h5>
            </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>Order Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Company Name</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>PostCode</th>
                    <th>Discount Code</th>
                    <th>Discount Amount($)</th>
                    <th>Shipping Amount($)</th>
                    <th>Total Amount($)</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($orders->isNotEmpty())
                @foreach ($orders as $order)
                  <tr>
                    <td>{{$order->order_number}}</td>
                    <td>{{$order->first_name}} {{$order->last_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->company_name}}</td>
                    <td>{{$order->country}}</td>
                    <td>{{$order->address_one}} <br> {{$order->address_one}}</td>
                    <td>{{$order->state}}</td>
                    <td>{{$order->postcode}}</td>
                    <td>{{$order->discount_code}}</td>
                    <td>{{number_format($order->discount_amount,2)}}</td>
                    <td>{{number_format($order->shipping_amount,2)}}</td>
                    <td>{{number_format($order->total_amount,2)}}</td>
                    <td style="text-transform: capitalize">{{$order->payment_method}}</td>

                    <td>
                        <select class="form-select ChangeStatus" id="{{$order->id}}" style="width: 140px">
                          <option {{($order->status == 0) ? 'selected' : ''}} value="0">Pending</option>
                          <option {{($order->status == 1) ? 'selected' : ''}} value="1">In progress</option>
                          <option {{($order->status == 2) ? 'selected' : ''}} value="2">Delivered</option>
                          <option {{($order->status == 3) ? 'selected' : ''}} value="3">Completed</option>
                          <option {{($order->status == 4) ? 'selected' : ''}} value="4">Cancelled</option>
                        </select>


                       </td>
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

              {{$orders->links('pagination::bootstrap-5')}}

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection

@section('script')
<script>
    $('body').delegate('.ChangeStatus','change',function() {
          let status = $(this).val();
          let order_id = $(this).attr('id');

           $.ajax({
               url : "{{route('orders.order_status')}}",
               type: "get",
               data: {
                 status : status,
                 order_id : order_id,
               },
               dataType: 'json',
               success:function(data) {
                 if(data.status == true){
                    alert(data.message)
                 }
               }

           });
    })
</script>

@endsection
