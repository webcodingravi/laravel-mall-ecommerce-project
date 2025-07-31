   @if ($categories->isNotEmpty())
       @foreach ($categories as $category)
           <tr>
               <td>
                   @if (!empty($category->image_name))
                       <img src="{{ asset('uploads/category/' . $category->image_name) }}" class="img-fluid"
                           style="width:200px; cursor:pointer;" alt="{{ $category->image_name }}">
                   @endif
               </td>
               <td>{{ $category->name }}</td>
               <td>{{ $category->slug }}</td>
               <td>{{ $category->button_name }}</td>
               <td>{{ !empty($category->is_home) ? 'Yes' : 'No' }}</td>
               <td>{{ !empty($category->is_menu) ? 'Yes' : 'No' }}</td>
               <td>{{ $category->created_by }}</td>
               <td>
                   @if (!empty($category->status == 1))
                       <span class="badge bg-success">Active</span>
                   @else
                       <span class="badge bg-danger">Deactive</span>
                   @endif
               </td>
               <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d M,Y') }}</td>

               <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm"
                       style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                   <a href="{{ route('category.delete', $category->id) }}"
                       onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i
                           class="bi bi-trash3-fill"></i> Delete</a>
               </td>

           </tr>
       @endforeach
   @else
       <tr>
           <td colspan="10">No Record Found.</td>
       </tr>
   @endif
