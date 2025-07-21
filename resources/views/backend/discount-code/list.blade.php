@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Discount Code List (Total: {{ $discountCodes->total() }})</h1>
            <div class="search-bar">

                <input type="search" name="query" id="search" placeholder="Search"
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
                            <div class="d-flex align-items-center justify-content-between">
                                <div></div>
                                <a class="p-2 my-2 btn btn-primary btn-sm" href="{{ route('discount.create') }}"
                                    style="background: #cc9966; border:none">+ Add Discount Code</a>
                            </div>

                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Discount Code Name</th>
                                        <th>Type</th>
                                        <th>Percent / Amount</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="discountCode-table">
                                    @include('backend.discount-code.table', [
                                        'discountCodes' => $discountCodes,
                                    ])
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            {{ $discountCodes->links('pagination::bootstrap-5') }}

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
            console.log(query)
            $.ajax({
                url: "{{ route('search_discountCode') }}",
                type: "GET",
                data: {
                    "query": query
                },
                success: function(data) {
                    $("#discountCode-table").html(data);
                }
            })

        })
    </script>
@endsection
