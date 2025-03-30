@component('mail::message')
<div class="email-container">
    <div class="header">
        <h2>Order Invoice</h2>
    </div>
    <p>Dear {{$order->first_name}},</p>
    <p>Order Status :
    @if($order->status == 0){
        Pending
    }@elseif ($order->status == 1){
          In Progress
    }@elseif ($order->status == 2){
       Delivered
    }@elseif ($order->status == 3){
        Completed
    }@elseif ($order->status == 4){
        Cancelled
    }
</p>

    <div class="order-details">
    <h3>Order Details:</h3>
    <ul>
        <li>Order Number: {{$order->order_number}}</li>
        <li>Date of Purchase: {{date('d-m-y',strtotime($order->created_at))}}</li>
    </ul>

        <table>
            <tr>
                <th style="padding: 8px; border-bottom:1px solid #ddd; text-align:left;">Item</th>
                <th style="padding: 8px; border-bottom:1px solid #ddd; text-align:left;">Quantity</th>
                <th style="padding: 8px; border-bottom:1px solid #ddd; text-align:left;">Price</th>
            </tr>
            <tr>
                @foreach ($order->getItem as $item)
                <td style="padding: 8px; border-bottom:1px solid #ddd;">
                    {{$item->getProduct->title}}
                    <br/>
                    Color : {{$item->color_name}}
                    @if (!empty($item->size_name))
                    <br/>
                    Size : {{$item->size_name}}
                    @endif
                    <br/>
                    Size Amount : ${{number_format($item->size_amount,2)}}

                </td>
                <td style="padding: 8px; border-bottom:1px solid #ddd;">{{$item->quantity}}</td>
                <td style="padding: 8px; border-bottom:1px solid #ddd;">${{number_format($order->total_amount,2)}}</td>
                @endforeach
            </tr>
            <!-- Repeat rows as needed -->
        </table>
        <p>Shipping Name: <strong>{{$order->getShipping->name}}</strong></p>
        <p>Shipping Amount: <strong>${{number_format($order->shipping_amount,2)}}</strong></p>

        @if (!empty($order->discount_code))
        <p>Discount Code: <strong>{{$order->discount_code}}</strong></p>
        <p>Discount Amount: <strong>${{number_format($order->discount_amount,2)}}</strong></p>
        @endif

        <p>Total Amount: <strong>${{number_format($order->total_amount,2)}}</strong></p>
        <p style="text-transform: capitalize">Payment Method: <strong>{{$order->payment_method}}</strong></p>
    </div>
    <p>Thank you for choosing <strong>E-commerce</strong>. We apperciate your business.</p>
</div>

Thanks,<br>
{{config('app.name')}}
@endcomponent
