   @if ($getCustomer->isNotEmpty())
       @foreach ($getCustomer as $customer)
           <tr>

               <td>{{ $customer->name }}</td>
               <td>{{ $customer->email }}</td>

               <td>
                   @if (!empty($customer->status == 1))
                       <span class="badge bg-success">Active</span>
                   @else
                       <span class="badge bg-danger">Deactive</span>
                   @endif
               </td>
               <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M,Y') }}</td>

               <td>
                   <a href="{{ route('customer.delete', $customer->id) }}"
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
