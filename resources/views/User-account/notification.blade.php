@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="text-center page-header" style="background-image: url({{ asset('assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">{{ $meta_title }}</h1>
            </div>
        </div>

        <div class="mt-5 page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        @include('User-account._sidebar')

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">

                                <table class="table table-striped table-bordered ">
                                    <tbody>
                                        @foreach ($getRecord as $notification)
                                            <tr>
                                                <td style="padding-left:10px;" class="d-block">
                                                    <a style = "color: #000 {{ empty($notification->is_read) ? 'font-weight:bold' : '' }}"
                                                        href="{{ $notification->url }}?noti_id={{ $notification->id }}">{{ $notification->message }}</a>
                                                    <div>
                                                        <small>{{ Carbon\Carbon::parse($notification->created_at)->format('d M,Y') }}
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
            </div>
        </div>
    </main>
@endsection
