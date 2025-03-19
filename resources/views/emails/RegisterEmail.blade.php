@component('mail::message')
Hi <b>{{$user->name}}</b>
<p>You're almost ready to start enjoying the benefits of E-Commerce</p>
<p>Simply Click the button below to verify your email address.</p>
<p>
    @component('mail::button',['url' => url('verify/'.base64_encode($user->id))])
       Verify
    @endcomponent
</p>
<p>This will verify your email address, and then you'll officially be a part of the E-Commerce</p>

@endcomponent
