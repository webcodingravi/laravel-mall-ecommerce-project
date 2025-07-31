@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Customer List (Total: {{ $getCustomer->total() }})</h1>

            <div class="search-bar">
                <input type="text" name="query" id="search" placeholder="Search"
                    class="form-control search-form d-flex align-items-center" title="Enter search keyword"
                    style="border-radius:0">
            </div>
        </div>

        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">

                    <div class="card">

                        <div class="overflow-auto card-body">
                            <div style="width: fit-content" class="mt-3">
                                <a href="{{ route('export_customer') }}" class="bg-success d-flex"
                                    style="padding:2px 20px;">
                                    <i class="ri-file-excel-2-line" style="font-size: 24px; color:white;"></i>
                                </a>

                            </div>

                            <table class="table mt-2 table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="customer-table">
                                    @include('backend.customer.table', ['getCustomer' => $getCustomer])
                                </tbody>
                            </table>

                            {{ $getCustomer->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection

@section('script')
    <script>
        $('body').delegate("#search", "keyup", function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('search_customer') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $("#customer-table").html(data)
                }
            })
        })
    </script>
@endsection
