@component('mail::message')
# Eliminazione post
 
Congratulazioni! Post "{{ $post_title }}" Eliminato con successo.
 
@component('mail::button', ['url' => route('admin.posts.index') ])
Boolpress: Articoli
@endcomponent
 
Grazie,<br>
{{ config('app.name') }}
@endcomponent