@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Slider List</h1>
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
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div></div>
                                <a class="p-2 my-2 btn btn-primary btn-sm" href="{{ route('slider.create') }}"
                                    style="background: #cc9966; border:none">+ Add Slider</a>
                            </div>

                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="50">Image</th>
                                        <th>Title</th>
                                        <th>Button Name</th>
                                        <th>Button Link</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="search-slider">
                                    @include('backend.slider.table', ['sliders' => $sliders])
                                </tbody>
                            </table>
                            {{ $sliders->links('pagination::bootstrap-5') }}
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
                url: "{{ route('search_slider') }}",
                type: "GET",
                data: {
                    'query': query
                },
                success: function(data) {
                    $('#search-slider').html(data)
                }
            })
        })
    </script>
@endsection
