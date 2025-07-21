@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">FAQ List (Total: {{ $faqs->total() }})</h1>
            <div class="search-bar">

                <input type="search" name="query" id="search" value="{{ Request::get('query') }}" placeholder="Search"
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
                                <a class="p-2 my-2 btn btn-primary btn-sm" href="{{ route('faq.create') }}"
                                    style="background: #cc9966; border:none">+ Add FAQ</a>
                            </div>

                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Questions</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody id="faq-table">
                                    @include('backend.faq.table', ['faqs' => $faqs])
                                </tbody>
                            </table>


                            {{ $faqs->links('pagination::bootstrap-5') }}

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
                url: "{{ route('search_faq') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $("#faq-table").html(data);
                }
            })
        })
    </script>
@endsection
