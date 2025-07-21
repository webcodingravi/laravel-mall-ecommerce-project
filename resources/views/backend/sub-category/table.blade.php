       @if ($SubCategories->isNotEmpty())
           @foreach ($SubCategories as $SubCategory)
               <tr>
                   <td>{{ $SubCategory->name }}</td>
                   <td>{{ $SubCategory->slug }}</td>
                   <td>{{ $SubCategory->CategoryName }}</td>
                   <td>{{ $SubCategory->created_by }}</td>
                   <td>
                       @if (!empty($SubCategory->status == 1))
                           <span class="badge bg-success">Active</span>
                       @else
                           <span class="badge bg-danger">Deactive</span>
                       @endif
                   </td>
                   <td>{{ \Carbon\Carbon::parse($SubCategory->created_at)->format('d M,Y') }}</td>

                   <td><a href="{{ route('sub-category.edit', $SubCategory->id) }}" class="btn btn-primary btn-sm"
                           style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                       <a href="{{ route('sub-category.delete', $SubCategory->id) }}"
                           onclick="return confirm('Are you sure you want delete record.')"
                           class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                   </td>

               </tr>
           @endforeach
       @else
           <tr>
               <td colspan="7">No Record Found.</td>
           </tr>
       @endif
