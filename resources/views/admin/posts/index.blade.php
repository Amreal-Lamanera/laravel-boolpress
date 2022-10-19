@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Elenco di posts:</h1>
        </div>
        <div class="col-4 text-left d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.posts.create') }}" type="button" class="btn btn-primary btn-sm">Nuovo Post</a>
        </div>
    </div>
</div>
<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                        <a href="{{ route('admin.posts.index') }}" class="fw_bold">
                            #
                        </a>
                </th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">
                    <form action="{{ route('admin.posts.ordered') }}" method="POST">
                        @csrf
                        <input type="submit" value="Created at" class="border-0 fw_bold">
                    </form>
                </th>
                <th scope="col">Show</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="{{ route('admin.posts.show', $post) }}" type="button" class="btn btn-primary btn-sm">
                        Vedi
                    </a>
                </td>
                <td>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection