@component('mail::message')
# Contact us.

<strong>Subject</strong> 
{{ $data['subject'] }}

<strong>Email</strong> 
{{ $data['mailMessege'] }}

From,<br>
{{ $data['email'] }}
@endcomponent
