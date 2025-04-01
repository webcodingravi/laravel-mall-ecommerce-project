@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Edit Discount Code</h1>
      <a class="btn btn-primary btn-sm" href="{{route('discount.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('discount.update',$discountCode->id)}}" method="post">
                @csrf
                @method('put')
                <div class="col-6">
                  <label class="form-label">Discount Code Name</label>
                  <input type="text" name="name" value="{{old('name',$discountCode->name)}}" placeholder="Please Enter Discount Code Name..." class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>

                <div class="col-6">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                     <option {{($discountCode->type == 'Amount') ? 'selected' : ''}} value="Amount">Amount</option>
                     <option {{($discountCode->type == 'Percent') ? 'selected' : ''}} value="Percent">Percent</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label class="form-label">Percent / Amount</label>
                    <input type="text" name="percent_amount" value="{{old('percent_amount',$discountCode->percent_amount)}}" placeholder="Please Enter Percent / Amount..." class="form-control @error('percent_amount') is-invalid @enderror">
                    @error('percent_amount')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label class="form-label">Expiry Date</label>
                    <input type="date" name="expiry_date" value="{{old('expiry_date',$discountCode->expiry_date)}}"  class="form-control @error('expiry_date') is-invalid @enderror">
                    @error('expiry_date')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>

                <div class="col-6">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option {{($discountCode->status == 1) ? 'selected' : ''}} value="1">Active</option>
                    <option {{($discountCode->status == 0) ? 'selected' : ''}} value="0">Deactive</option>
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
