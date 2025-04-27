@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">System Setting</h1>
 </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('UpdateSystemSetting')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label class="form-label">Website Name</label>
                    <input type="text" name="website_name" value="{{$setting->website_name}}" class="form-control" placeholder="Website Name...">

                  </div>

                <div class="col-12">
                  <label class="form-label">Logo</label>
                  <input type="file" name="logo"  class="form-control" accept="image*/">
                  @if (!empty($setting->logo))
                  <div class="mt-2 show-image">
                    <img src="{{asset('uploads/setting/logo/'.$setting->logo)}}" class="img-fluid" style="width: 100px;" alt="">
                   </div>
                  @endif

                </div>

                <div class="col-12">
                    <label class="form-label">Favicon</label>
                    <input type="file" name="favicon"  class="form-control" accept="image*/">
                    @if (!empty($setting->favicon))
                    <div class="mt-2 show-image">
                      <img src="{{asset('uploads/setting/favicon/'.$setting->favicon)}}" class="img-fluid" style="width: 100px;" alt="">
                     </div>
                    @endif
                  </div>

                <div class="col-12">
                  <label class="form-label">Footer Description</label>
                  <textarea name="footer_description" cols="30" rows="5" class="form-control" placeholder="Footer Description..">{{$setting->footer_description}}</textarea>

                </div>

                <div class="col-12">
                    <label class="form-label">Footer Payment Icon</label>
                    <input type="file" name="footer_payment_icon"  class="form-control" accept="image*/">
                    @if (!empty($setting->payment_icon))
                    <div class="mt-2 show-image">
                        <img src="{{asset('uploads/setting/payment-icon/'.$setting->payment_icon)}}" alt="">
                       </div>
                    @endif

                  </div>

                  <hr>

                  <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea  name="address" cols="30" rows="5" class="form-control" placeholder="Address..">{{$setting->address}}</textarea>

                  </div>

                  <div class="col-6">
                    <label class="form-label">Phone </label>
                    <input type="text" name="phone" value="{{$setting->phone}}" class="form-control" placeholder="Please Enter Phone Number...">

                  </div>

                  <div class="col-6">
                    <label class="form-label">Phone 2</label>
                    <input type="text" name="phone_two" value="{{$setting->phone_two}}"  class="form-control" placeholder="Please Enter Phone Number 2...">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Submit Contact Email</label>
                    <input type="email" name="submit_email" value="{{$setting->submit_email}}" class="form-control" placeholder="Please Enter Email...">

                  </div>

                  <div class="col-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{$setting->email}}" class="form-control" placeholder="Please Enter Email...">

                  </div>

                  <div class="col-6">
                    <label class="form-label">Email 2</label>
                    <input type="email" name="email_two" value="{{$setting->email_two}}" class="form-control" placeholder="Please Enter Email 2...">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Working Hour</label>
                    <textarea name="working_hour" cols="30" rows="5" class="form-control" placeholder="Please Enter Working Hour..">{{$setting->working_hour}}</textarea>

                  </div>

                  <hr>

                  <div class="col-12">
                    <label class="form-label">Facebook Link</label>
                    <input type="text" value="{{$setting->facebook_link}}" name="facebook_link" class="form-control" placeholder="Facebook Link...">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Twitter Link</label>
                    <input type="text" value="{{$setting->twitter_link}}" name="twitter_link" class="form-control" placeholder="Twitter Link...">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Instagram Link</label>
                    <input type="text" value="{{$setting->instagram_link}}" name="instagram_link" class="form-control" placeholder="Instagram Link...">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Youtube Link</label>
                    <input type="text" value="{{$setting->youtube_link}}" name="youtube_link" class="form-control" placeholder="Youtube Link...">

                  </div>

                  <div class="col-12">
                    <label class="form-label">Pinterest Link</label>
                    <input type="text" value="{{$setting->pinterest_link}}" name="pinterest_link" class="form-control" placeholder="Pinterest Link...">

                  </div>

                <div class="">

                  <button type="submit" class="btn btn-primary btn-sm" style="background: #cc9966; border:none">Update</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
