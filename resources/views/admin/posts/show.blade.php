@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>
                    {{ $post->title }}
                </h1>
                <h4>
                    Categoria: {{ $post->category ? $post->category->name : '-' }}
                </h4>
            </div>
            <div class="col-4 text-left d-flex justify-content-end align-items-center">
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>
                    {!! $post->content !!}
                </p>
            </div>
        </div>
    </div>

@endsection