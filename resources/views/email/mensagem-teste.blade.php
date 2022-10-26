@component('mail::message')
# Introdução

O corpo da mensagem.

@component('mail::button', ['url' => ''])
Texto do button
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
