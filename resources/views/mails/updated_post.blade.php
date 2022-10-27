@component('mail::message')
# Aggiornamento post
 
Congratulazioni! Post modificato con successo.
 
@component('mail::button', ['url' => route('admin.posts.show', $post) ])
{{ $post->title }}
@endcomponent
 
Grazie,<br>
{{ config('app.name') }}
@endcomponent