@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1>Edit Shipping Charge</h1>
      <a class="btn btn-primary btn-sm" href="{{route('shipping.list')}}"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('shipping.update',$ShippingCharge->id)}}" method="post">
                @csrf
                @method('put')
                <div class="col-6">
                  <label class="form-label">Shipping Charge Name</label>
                  <input type="text" name="name" value="{{old('name',$ShippingCharge->name)}}" placeholder="Please Enter Shipping Charge Name..." class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>


                  <div class="col-6">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" value="{{old('price',$ShippingCharge->price)}}" placeholder="Please Enter Price..." class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>



                <div class="col-6">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option {{($ShippingCharge->status == 1) ? 'selected' : ''}} value="1">Active</option>
                    <option {{($ShippingCharge->status == 0) ? 'selected' : ''}} value="0">Deactive</option>
                  </select>
                </div>

                <div class="">
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
