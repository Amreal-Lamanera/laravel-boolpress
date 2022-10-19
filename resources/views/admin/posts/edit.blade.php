@extends('layouts.app')

@section('content')

    <div class="container">
        <form action=" {{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo dell'articolo.." value="{{ old('title', $post->title) }}">
            @error('title')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>
            <div class="form-group">
            <label for="content">Testo</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="20" placeholder="Inserisci il contenuto dell'articolo..">{!! old('content', $post->content) !!}</textarea>
            @error('content')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>

        </form>
    </div>

@endsection