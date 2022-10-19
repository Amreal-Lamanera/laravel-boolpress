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
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col">Show</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
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
                    <a href="{{ route('admin.posts.destroy', $post) }}" type="button" class="btn btn-danger btn-sm">
                        Elimina
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection