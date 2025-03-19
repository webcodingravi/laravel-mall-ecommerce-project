@extends('backend.layouts.app')
@section('content')
<main id="main" class="main" style="height: 100vh">
    <div class="pagetitle d-flex justify-content-between">
      <h1>Edit Product</h1>
      <a class="btn btn-primary btn-sm" href="{{route('product.list')}}"><i class="bi bi-arrow-right-circle-fill"></i> Back</a>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        @include('alertMessage.alertMessage')
        <div class="col-lg-12">
          <div class="pt-4 card">
            <div class="card-body">
              <form class="row g-3" action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-6">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" value="{{old('title',$product->title)}}" id="title" placeholder="Please Enter Product Title..." class="form-control @error('title') is-invalid @enderror">
                  @error('title')
                      <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-6">
                  <label class="form-label">Slug</label>
                  <input type="text" value="{{old('slug',$product->slug)}}" name="slug" id="slug" class="form-control" placeholder="Please Enter Product Slug....">
                </div>

                <div class="col-12">
                    <label class="form-label">SKU</label>
                    <input type="text" value="{{old('sku',$product->sku)}}" name="sku" class="form-control" placeholder="Please Enter SKU....">
                  </div>

                  <div class="col-6">
                    <label class="form-label">Category</label>
                     <select class="form-select" id="category" name="category_id">
                        <option value="">Please Select..</option>
                        @foreach ($getCategory as $category)
                        <option {{($product->category_id == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                     </select>
                  </div>


                  <div class="col-6">
                    <label class="form-label">Sub Category</label>
                     <select class="form-select" id="getSubCategory" name="sub_category_id">
                        <option value="">Please Select..</option>
                        @foreach ($getSubCategory as $subCategory)
                        <option {{($product->sub_category_id == $subCategory->id) ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="col-6">
                    <label class="form-label">Brand</label>
                     <select class="form-select" name="brand_id">
                        <option value="">Please Select..</option>
                        @foreach ($getBrand as $brand)
                        <option {{($product->brand_id == $brand->id) ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                     </select>
                  </div>


                  <div class="col-12">
                    <label class="form-label">Color</label>
                    @if ($getColor->isNotEmpty())
                    @foreach ($getColor as $color)
                    @php
                        $checked = '';
                    @endphp
                    @foreach ($product->getColor as $pcolor)
                    @if ($pcolor->color_id == $color->id)
                                @php
                                $checked = 'checked';
                            @endphp
                    @endif

                    @endforeach
                    <div>
                        <input type="checkbox" {{$checked}} value="{{$color->id}}" name="color_id[]">
                        <label class="form-label">{{$color->name}}</label>
                        </div>
                    @endforeach
                    @endif

                  </div>

                  <div class="col-6">
                    <label class="form-label">Price ($)</label>
                    <input type="text" value="{{!empty($product->price) ? $product->price : ''}}" name="price" class="form-control" placeholder="Please Enter Price....">
                  </div>

                  <div class="col-6">
                    <label class="form-label">Old Price ($)</label>
                    <input type="text" value="{{!empty($product->old_price) ? $product->old_price : ''}}" name="old_price" class="form-control" placeholder="Please Enter Old Price....">
                  </div>

                  <div class="col-12">
                    <label class="form-label">Product Size</label>
                    <table class="table table-boardered table-striped">
                        <thead>
                            <th>Size</th>
                            <th>Price ($)</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="AppendSize">
                            @php
                                $i_s = 1;
                            @endphp
                            @foreach ($product->getSize as $size)
                            <tr id="DeleteSize{{$i_s}}">
                                <td><input type="text" value="{{$size->size}}" name="size[{{$i_s}}][size]" class="form-control" placeholder="Please Enter Size...."></td>
                                <td><input type="text" value="{{$size->price}}" name="size[{{$i_s}}][price]" class="form-control" placeholder="Please Enter Price...."></td>
                                <td>
                                    <button class="btn btn-danger btn-sm DeleteSize" id="{{$i_s}}"><i class="bi bi-trash3-fill"></i> Delete</button>

                                </td>
                            </tr>
                            @php
                            $i_s++;
                            @endphp
                            @endforeach


                            <tr>
                                <td><input type="text" name="size[100][size]" class="form-control" placeholder="Please Enter Size...."></td>
                                <td><input type="text" name="size[100][price]" class="form-control" placeholder="Please Enter Price...."></td>
                                <td>
                                    <button class="btn btn-primary btn-sm addSize">+Add</button>

                                </td>

                            </tr>

                        </tbody>
                    </table>
                  </div>


                  <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" multiple name="image[]" accept="image/*">
                  </div>
                  @if (!empty($product->getImage))
                      <div class="row" id="sortable">
                        @foreach ($product->getImage as $image)
                        <div class="mt-3 col-md-1 sortable_image" id="{{$image->id}}" style="text-align: center;">
                            <img src="{{asset('uploads/product/'.$image->image_name)}}" class="img-fluid" style="width: 100%; height:130px; object-fit:cover;">
                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{route('ImageDelete',$image->id)}}" class="mt-2 btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                        </div>
                        @endforeach

                      </div>
                  @endif

                  <div class="col-12">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" id="" cols="2" rows="3" class="tinymce-editor" placeholder="Please Enter Short Description....">{{old('short_description',$product->short_description)}}</textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="" cols="2" rows="3" class="tinymce-editor" placeholder="Please Enter Description....">{{old('description',!empty($product->description) ? $product->description : '')}}</textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Additional Information</label>
                    <textarea name="additional_information" id="" cols="2" rows="3" class="tinymce-editor"  placeholder="Please Enter Additional Information....">{{old('additional_information',!empty($product->additional_information) ? $product->additional_information : '')}}</textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Shipping Returns</label>
                    <textarea name="shipping_returns" id="" cols="2" rows="3" class="tinymce-editor" placeholder="Please Enter Shipping Returns....">{{old('shipping_returns',!empty($product->shipping_returns) ? $product->shipping_returns: '')}}</textarea>
                  </div>

                  <div class="col-6">
                    <label class="form-label">Status</label>
                     <select class="form-select" name="status">
                        <option {{($product->status == 1) ? 'selected' : ''}} value="1">Active</option>
                        <option {{($product->status == 0) ? 'selected' : ''}} value="0">Deactive</option>
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

@section('script')
<script>

    $(document).ready(function() {
        //  sortable image
        $("#sortable").sortable({
            update : function(event, ui) {
            var photo_id = new Array();
            $(".sortable_image").each(function() {
                var id = $(this).attr('id');
                photo_id.push(id);
            });

            $.ajax({
                url : '{{route("ProductImageSortable")}}',
                type : 'post',
                data : {
                    photo_id : photo_id,
                    "_token" : "{{csrf_token()}}"
                },
                dataType : 'json',
                success: function(response) {

                }
            })

            }
        });
    })

    $(document).ready(function() {
        $("#title").keyup(function() {
        element = $(this).val();
        $.ajax({
           url : '{{route("slug")}}',
           type: 'get',
           data : {title : element},
           dataType : 'json',
           success : function(response) {
            if(response['status'] == true) {
                $("#slug").val(response['slug']);
            }

           }
        });
      })


    //   get sub_categroy
      $('#category').change(function() {
        var id = $(this).val();
         $.ajax({
            url: '{{route("getSubCategory")}}',
            type: 'post',
            data: {
                  id: id,
                 "_token" : "{{csrf_token()}}"
            },
            dataType : 'json',
            success : function(response) {
                 $("#getSubCategory").html(response.html);
            }
         });
      });

 //   size multiple add
 var i = 101;
     $(".addSize").click(function(e) {
        e.preventDefault();
        var html = '<tr id="DeleteSize'+i+'">\n\
                <td><input type="text" name="size['+i+'][size]"  class="form-control" placeholder="Please Enter Size...."></td>\n\
                <td><input type="text" name="size['+i+'][price]" class="form-control" placeholder="Please Enter Price...."></td>\n\
                <td><button class="btn btn-danger btn-sm DeleteSize" id="'+i+'"><i class="bi bi-trash3-fill"></i> Delete</button></td>\n\
                </tr>';
                i++;
                $("#AppendSize").append(html);
     });




 //   size multiple Delete
 $("body").delegate('.DeleteSize','click',function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    $('#DeleteSize'+id).remove();
 })




    });
</script>

@endsection
