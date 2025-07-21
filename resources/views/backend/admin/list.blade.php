@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Admin List (Total: {{ $getAdmins->total() }})</h1>
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
                        <div class="overflow-hidden card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div></div>
                                <a class="p-2 my-2 btn btn-primary btn-sm" href="{{ route('admin.create') }}"
                                    style="background: #cc9966; border:none;">+ Add Admin</a>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Profile Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="admin-table">
                                    @include('backend.admin.table', ['getAdmins' => $getAdmins])
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            {{ $getAdmins->links('pagination::bootstrap-5') }}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection

@section('script')
    <script>
        $('#search').on('keyup', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('search_admin') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $('#admin-table').html(data);
                }
            })
        })
    </script>
@endsection
