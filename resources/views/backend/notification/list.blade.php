@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main" style="height: 100vh">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">Notifications</h1>

        </div>

        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="overflow-auto card-body">
                            <table class="table mt-4 table-striped table-bordered">

                                <tbody>

                                    @foreach ($getRecord as $notification)
                                        <tr>
                                            <td>
                                                <a style = "color: #000 {{ empty($notification->is_read) ? 'font-weight:bold' : '' }}"
                                                    href="{{ $notification->url }}?noti_id={{ $notification->id }}">{{ $notification->message }}</a>

                                                <div class="mt-4">
                                                    <small
                                                        class="mt-4">{{ Carbon\Carbon::parse($notification->created_at)->format('d M,Y') }}
                                                        at
                                                        {{ Carbon\Carbon::parse($notification->created_at)->format('h:i A') }}</small>
                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            {{ $getRecord->links('pagination::bootstrap-5') }}

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
