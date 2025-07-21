     @if ($faqs->isNotEmpty())
         @foreach ($faqs as $faq)
             <tr>
                 <td>{{ $faq->question }}</td>
                 <td>{{ $faq->username }}</td>
                 <td>
                     @if (!empty($faq->status == 1))
                         <span class="badge bg-success">Active</span>
                     @else
                         <span class="badge bg-danger">Deactive</span>
                     @endif
                 </td>
                 <td>{{ \Carbon\Carbon::parse($faq->created_at)->format('d M,Y') }}</td>

                 <td><a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary btn-sm"
                         style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                     <a href="{{ route('faq.delete', $faq->id) }}"
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
