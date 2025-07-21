 @if ($sliders->isNotEmpty())
     @foreach ($sliders as $slider)
         <tr>
             <td>
                 @if (!empty($slider->image_name))
                     <img src="{{ asset('uploads/slider/' . $slider->image_name) }}" style="width: 200px; cursor:pointer;"
                         alt="">
                 @endif
             </td>
             <td>{{ $slider->title }}</td>
             <td>{{ $slider->button_name }}</td>
             <td>{{ $slider->button_link }}</td>

             <td>
                 @if (!empty($slider->status == 1))
                     <span class="badge bg-success">Active</span>
                 @else
                     <span class="badge bg-danger">Deactive</span>
                 @endif
             </td>
             <td>{{ \Carbon\Carbon::parse($slider->created_at)->format('d M,Y') }}</td>

             <td>
                 <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary btn-sm"
                     style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                 <a href="{{ route('slider.delete', $slider->id) }}"
                     onclick="return confirm('Are you sure you want delete record.')" class="btn btn-danger btn-sm"><i
                         class="bi bi-trash3-fill"></i> Delete</a>
             </td>

         </tr>
     @endforeach
 @else
     <tr>
         <td colspan="7">No Record Found.</td>
     </tr>
 @endif
