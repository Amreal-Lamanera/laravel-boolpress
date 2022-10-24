@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex
            align-items-center justify-content-between align-items-center mb-5">

                <a href="{{ route('admin.tags.show', $tag->id) }}" class="badge badge-light text-dark p-3 fs-1 fs-4">
                    {{ $tag->name }}
                </a>

                <div>
                    <a href="{{ route('admin.tags.edit', $tag) }}" type="button" class="btn btn-primary btn-sm">
                        Modifica Tag
                    </a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" data-toggle="modal" data-target="#popup" class="btn btn-danger btn-sm">
                        Elimina
                    </button>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="popupLabel">Elimina tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Eliminare il tag? L'azione è irreversibile...
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Annulla</button>
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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
            @foreach ($tag->posts()->orderBy('title', 'asc')->get() as $post)
            <div class="col-4 p-2">
                <div class="card h-100">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      @if (isset($post->category))
                      <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                      @endif
                      <p class="card-text">{{ $post->slug }}</p>
                      <a href="{{ route('admin.posts.show', $post) }}" class="card-link mt-auto">Link all'articolo completo</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection