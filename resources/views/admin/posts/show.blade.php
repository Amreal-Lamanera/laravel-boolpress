@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>
                    {{ $post->title }}
                </h1>

                <div class="mb-5">
                    <h4 class="d-inline">
                        Categoria:
                    </h4>
                    <div class="d-inline">
                        {{ $post->category ? $post->category->name : '-' }}
                    </div>
                </div>

                <div class="d-flex align-items-center pb-3">
                    <h4 class="mr-3 mb-0">
                        Tags:
                    </h4>
                    @forelse ($post->tags as $tag)
                        <a href="{{ route('admin.tags.show', $tag->id) }}" class="badge badge-light text-dark mr-1 p-2">
                            {{ $tag->name }}
                        </a>
                    @empty
                        <span>Nessun tag</span>
                    @endforelse
                </div>
            </div>
            
            <div class="col-4 text-left d-flex justify-content-end align-items-start">
                <a href="{{ route('admin.posts.edit', $post) }}" type="button" class="btn btn-primary btn-sm mr-3">Modifica</a>
                <!-- Button trigger modal -->
                <button type="button" data-toggle="modal" data-target="#popup" class="btn btn-danger btn-sm">
                    Elimina
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="popupLabel">Elimina post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Eliminare l'articolo? L'azione è irreversibile...
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annulla</button>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
    
                            <input type="submit" class="btn btn-danger btn-sm" value="Elimina">
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-3 border-top border-1">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">
                    Contenuto:
                </h2>
                <p>
                    {!! $post->content !!}
                </p>
            </div>
        </div>
    </div>

@endsection