  @if ($orders->isNotEmpty())
      @foreach ($orders as $order)
          <tr>
              <td>{{ $order->order_number }}</td>
              <td>{{ $order->first_name }} {{ $order->last_name }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->company_name }}</td>
              <td>{{ $order->country }}</td>
              <td>{{ $order->address_one }} <br> {{ $order->address_one }}</td>
              <td>{{ $order->state }}</td>
              <td>{{ $order->postcode }}</td>
              <td>{{ $order->discount_code }}</td>
              <td>{{ number_format($order->discount_amount, 2) }}</td>
              <td>{{ number_format($order->shipping_amount, 2) }}</td>
              <td>{{ number_format($order->total_amount, 2) }}</td>
              <td style="text-transform: capitalize">{{ $order->payment_method }}</td>

              <td>
                  <select class="form-select ChangeStatus" id="{{ $order->id }}" style="width: 140px">
                      <option {{ $order->status == 0 ? 'selected' : '' }} value="0">Pending</option>
                      <option {{ $order->status == 1 ? 'selected' : '' }} value="1">In progress</option>
                      <option {{ $order->status == 2 ? 'selected' : '' }} value="2">Delivered</option>
                      <option {{ $order->status == 3 ? 'selected' : '' }} value="3">Completed</option>
                      <option {{ $order->status == 4 ? 'selected' : '' }} value="4">Cancelled</option>
                  </select>


              </td>
              <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M,Y') }}</td>


              <td class="gap-2 d-flex"><a href="{{ route('orders.details', $order->id) }}" class="btn btn-primary btn-sm"
                      style="background: #cc9966; border:none"><i class="bi bi-eye"></i> </a>
                  <a href="{{ route('orders.delete', $order->id) }}" class="btn btn-danger btn-sm"
                      onclick="return confirm('Are you sure you want delete record.')"> <i
                          class="bi bi-trash3-fill"></i></a>

              </td>

          </tr>
      @endforeach
  @else
      <tr>
          <td colspan="7">No Record Found.</td>
      </tr>
  @endif
