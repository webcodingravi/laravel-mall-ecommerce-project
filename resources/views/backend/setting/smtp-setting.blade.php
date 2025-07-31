@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle d-flex justify-content-between">
            <h1 style="color: #cc9966;">SMTP Setting</h1>
        </div>
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3 gap-2" action="{{ route('update_smtp_setting') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Website Name</label>
                                    <input type="text" name="name" value="{{ $getRecord->name }}"
                                        class="form-control">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Mail Mailer</label>
                                    <input type="text" name="mail_mailer" value="{{ $getRecord->mail_mailer }}"
                                        class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Mail Host</label>
                                    <input type="text" name="mail_host" value="{{ $getRecord->mail_host }}"
                                        class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Mail Port</label>
                                    <input type="text" name="mail_port" value="{{ $getRecord->mail_port }}"
                                        class="form-control">

                                </div>

                                <div class="col-12">
                                    <label class="form-label">Mail Username</label>
                                    <input type="text" name="mail_username" value="{{ $getRecord->mail_username }}"
                                        class="form-control">

                                </div>




                                <div class="col-12">
                                    <label class="form-label">Mail Password</label>
                                    <input type="text" name="mail_password" value="{{ $getRecord->mail_password }}"
                                        class="form-control">

                                </div>



                                <div class="col-12">
                                    <label class="form-label">Mail Encryption</label>
                                    <input type="text" name="mail_encryption" value="{{ $getRecord->mail_encryption }}"
                                        class="form-control">

                                </div>




                                <div class="col-12">
                                    <label class="form-label">Mail From Address</label>
                                    <input type="text" name="mail_from_address"
                                        value="{{ $getRecord->mail_from_address }}" class="form-control">

                                </div>



                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-sm"
                                        style="background: #cc9966; border:none">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
