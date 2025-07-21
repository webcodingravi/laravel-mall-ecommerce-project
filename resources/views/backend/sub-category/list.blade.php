@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Sub Category List (Total: {{ $SubCategories->total() }})</h1>
            <div class="search-bar">
                <input type="search" name="query" placeholder="Search" id="search"
                    class="form-control search-form d-flex align-items-center" title="Enter search keyword"
                    style="border-radius:0">
            </div>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="overflow-auto card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div></div>
                                <a class="p-2 my-2 btn btn-primary btn-sm" href="{{ route('sub-category.create') }}"
                                    style="background: #cc9966; border:none">+ Add Sub Category</a>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sub Category</th>
                                        <th>Slug</th>
                                        <th>Category Name</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sub_category_table">
                                    @include('backend.sub-category.table', [
                                        'SubCategories' => $SubCategories,
                                    ])
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            {{ $SubCategories->links('pagination::bootstrap-5') }}

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
                url: "{{ route('search_sub_category') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $("#sub_category_table").html(data);
                }
            })
        })
    </script>
@endsection
