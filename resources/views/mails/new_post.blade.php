@component('mail::message')
# Nuovo post
 
Congratulazioni! Post creato con successo.
 
@component('mail::button', ['url' => route('admin.posts.show', $post) ])
{{ $post->title }}
@endcomponent
 
Grazie,<br>
{{ config('app.name') }}
@endcomponent