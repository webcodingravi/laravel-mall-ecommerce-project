@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Edit Partner</h1>
      <a class="btn btn-primary btn-sm" href="{{route('partner.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('partner.update',$partner->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-12">
                    <label class="form-label">Partner Logo</label>
                    <input type="file" name="image_name" value="{{old('image_name')}}" class="form-control" accept="image/*">
                    @error('image_name')
                        <span style="color:red">{{$message}}</span>
                    @enderror

                    @if (!empty($partner->image_name))
                    <div class="mt-2">
                        <img src="{{asset('uploads/partner_logo/'.$partner->image_name)}}" alt="{{$partner->image_name}}">
                      </div>
                    @endif


                  </div>


                  <div class="col-12">
                    <label class="form-label">Link</label>
                    <input type="text" name="link" value="{{old('link',$partner->link)}}" placeholder="Please Enter Link..." class="form-control">

                  </div>

                <div class="col-12">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option value="1" {{($partner->status == '1') ? 'selected' : ''}}>Active</option>
                    <option value="0" {{($partner->status == '0') ? 'selected' : ''}}>Deactive</option>
                  </select>
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
