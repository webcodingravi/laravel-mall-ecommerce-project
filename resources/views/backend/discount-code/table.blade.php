   @if ($discountCodes->isNotEmpty())
       @foreach ($discountCodes as $discount)
           <tr>
               <td>{{ $discount->name }}</td>

               <td>{{ $discount->type }}</td>
               <td>
                   @if ($discount->type == 'Amount')
                       ${{ number_format($discount->percent_amount, 2) }}
                   @else
                       {{ $discount->percent_amount }}%
                   @endif
               </td>
               <td>{{ \Carbon\Carbon::parse($discount->expiry_date)->format('d M,Y') }}</td>
               <td>
                   @if (!empty($discount->status == 1))
                       <span class="badge bg-success">Active</span>
                   @else
                       <span class="badge bg-danger">Deactive</span>
                   @endif
               </td>

               <td>
                   <a href="{{ route('discount.edit', $discount->id) }}" class="btn btn-primary btn-sm"
                       style="background: #cc9966; border:none"><i class="bi bi-pencil-square"></i> Edit</a>
                   <a href="{{ route('discount.delete', $discount->id) }}"
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
