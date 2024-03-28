<x-mail::message>
# Asset Expiry Notification

Some of your {{$asset}} assets will expire in {{$days}} . Click the link below to view them.

<x-mail::button url="{!!$url!!}">
View Assets
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
