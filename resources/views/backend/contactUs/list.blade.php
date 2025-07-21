@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Contact Us List (Total: {{ $contacts->total() }})</h1>

        </div>

        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="overflow-auto card-body">
                            <table class="table mt-4 table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Login Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($contacts->isNotEmpty())
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ !empty($contact->getUser) ? $contact->getUser->name : '' }}</td>
                                                <td>{{ $contact->name }}</td>

                                                <td>{{ $contact->email }}</td>

                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                <td>{{ $contact->message }}</td>
                                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M,Y') }}</td>

                                                <td>
                                                    <a href="{{ route('contact.delete', $contact->id) }}"
                                                        onclick="return confirm('Are you sure you want delete record.')"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i>
                                                        Delete</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No Record Found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>


                            {{ $contacts->links('pagination::bootstrap-5') }}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
