   @if ($blogs->isNotEmpty())
       @foreach ($blogs as $blog)
           <tr>
               <td>
                   @if (!empty($blog->image))
                       <img src="/uploads/blogs/{{ $blog->image }}" style="width: 150px;" alt={{ $blog->title }}>
                   @endif

               </td>
               <td>{{ $blog->title }}</td>
               <td>{{ $blog->slug }}</td>
               <td>
                   @if (!empty($blog->status == 1))
                       <span class="badge bg-success">Active</span>
                   @else
                       <span class="badge bg-danger">Deactive</span>
                   @endif
               </td>

               <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M,Y') }}</td>

               <td><a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary btn-sm"
                       style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                   <a href="{{ route('blog.delete', $blog->id) }}"
                       onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i
                           class="bi bi-trash3-fill"></i>
                       Delete</a>
               </td>

           </tr>
       @endforeach
   @else
       <tr>
           <td colspan="7">No Record Found.</td>
       </tr>
   @endif
