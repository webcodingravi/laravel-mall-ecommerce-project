@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">

        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Orders List (Total: {{ $orders->total() }})</h1>
            <div class="search-bar">
                <input type="search" name="query" placeholder="Search" id="search"
                    class="form-control search-form d-flex align-items-center" title="Enter search keyword"
                    style="border-radius:0">
            </div>
        </div>


        <div class="mb-3 section">
            <div class="row">
                <form action="" method="get">
                    <div class="gap-3 px-3 py-3 bg-white col-md-12 d-flex align-items-center">
                        <div class="form-group">
                            <label for="" class="mb-1">From Date</label>
                            <input type="date" value="{{ Request::get('from') }}" name="from" class="form-control"
                                style="border-radius: 0">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">To Date</label>
                            <input type="date" value="{{ Request::get('to') }}" name="to" class="form-control"
                                style="border-radius: 0">

                        </div>
                        <button type="submit" class="mt-4 btn btn-primary"
                            style="border-radius: 0; background: #cc9966; border:none">Search</button>

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

                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Order Number(#)</th>
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
                                <tbody id="brand-table">
                                    @include('backend.orders.table', ['orders' => $orders])
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            {{ $orders->links('pagination::bootstrap-5') }}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection

@section('script')
    <script>
        $('body').delegate('.ChangeStatus', 'change', function() {
            let status = $(this).val();
            let order_id = $(this).attr('id');

            $.ajax({
                url: "{{ route('orders.order_status') }}",
                type: "get",
                data: {
                    status: status,
                    order_id: order_id,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == true) {
                        alert(data.message)
                    }
                }

            });
        })

        $('body').delegate('#search', 'keyup', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('search_orders') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $("#brand-table").html(data)
                }
            })
        })
    </script>
@endsection
