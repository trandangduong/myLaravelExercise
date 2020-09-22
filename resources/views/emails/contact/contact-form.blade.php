@component('mail::message')
# Thank you for your message

<strong>Name: </strong> {{ $data['name]' }}
<strong>Mail: </strong> {{ $data['mail]' }}
<strong>Message: </strong> {{ $data['message]' }}

@endcomponent
