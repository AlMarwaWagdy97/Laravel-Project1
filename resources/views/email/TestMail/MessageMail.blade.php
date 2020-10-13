@component('mail::message')
# Introduction

The body of your message.
The Laravel Message Email Test.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
