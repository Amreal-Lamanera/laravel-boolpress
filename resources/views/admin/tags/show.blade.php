@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex
            align-items-center">
                <a href="{{ route('admin.tags.show', $tag->id) }}" class="badge badge-light text-dark p-3 fs-1 mb-5 fs-4">
                    {{ $tag->name }}
                </a>
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
                      <a href="{{ route('admin.posts.show', $post) }}" class="card-link">Link all'articolo completo</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection