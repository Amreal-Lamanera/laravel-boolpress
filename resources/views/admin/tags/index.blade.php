@extends ('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="mb-3">
                Tags:
            </h1>
            <div>
                <a href="{{ route('admin.tags.create') }}" type="button" class="btn btn-primary btn-sm">
                    Nuovo Tag
                </a>
            </div>
        </div>
        <div>
            @foreach($tags as $tag)
                <a href="{{ route('admin.tags.show', $tag->id) }}" class="badge badge-light text-dark p-3 mr-1 mb-3 fs-1">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>

@endsection