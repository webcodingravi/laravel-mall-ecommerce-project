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
                  <table class="table text-center table-striped table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>Order Number(#)</th>
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
                        <td>${{number_format($order->total_amount,2)}}</td>
                        <td style="text-transform: capitalize">{{$order->payment_method}}</td>

                        <td>
                        @if ($order->status == 0)
                            <span class="badge bg-warning">Pending</span>
                            @elseif ($order->status == 1)
                            <span class="badge bg-warning">In Progress</span>

                            @elseif ($order->status == 2)
                            <span class="badge bg-success">Delivered</span>

                            @elseif ($order->status == 3)
                            <span class="badge bg-success">Completed</span>

                            @elseif ($order->status == 4)
                            <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>

                        <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M, Y')}}</td>

                        <td>
                            <a href="{{route('user_order_details',$order->id)}}" class="btn btn-primary btn-sm">
                            <i class="icon-eye"></i>View Detail </a>
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
</div>
</div>
</main>
@endsection
