@component('mail::message')
    <strong> Hi Admin </strong><br/>

     <p><strong>Name: </strong>{{$contact->name}}</p>
     <p><strong>Email: </strong> {{$contact->email}}</p>
     <p><strong>Phone: </strong> {{$contact->phone}}</p>
     <p><strong>Subject: </strong> {{$contact->subject}}</p>
     <p><strong>Message: </strong> {{$contact->messae}}</p>
@endcomponent
