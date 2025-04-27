@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1 style="color: #cc9966;">Create FAQ</h1>
      <a class="btn btn-primary btn-sm" href="{{route('faq.list')}}" style="background: #cc9966; border:none"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('faq.store')}}" method="post">
                @csrf
                <div class="col-6">
                  <label class="form-label">Question</label>
                  <input type="text" name="question" value="{{old('question')}}" placeholder="Please Enter Question..." class="form-control @error('question') is-invalid @enderror">
                  @error('question')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Answer</label>
                    <textarea name="answer" id="" cols="30" rows="10" class="tinymce-editor" placeholder="Answer..."></textarea>
                </div>

                <div class="col-6">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                  </select>
                </div>


                <div class="">
                  <button type="submit" class="btn btn-primary btn-sm" style="background: #cc9966; border:none">Submit</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
