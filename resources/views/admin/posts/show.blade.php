@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>
                    {{ $post->title }}
                </h1>
            </div>
            <div class="col-4 text-left d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.posts.edit', $post) }}" type="button" class="btn btn-primary btn-sm mr-3">Modifica</a>
                <a href="{{ route('admin.posts.destroy', $post) }}" type="button" class="btn btn-danger btn-sm">Elimina</a>
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