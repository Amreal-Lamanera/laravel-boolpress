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
                <label for="category">Categoria</label>
                <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror" >
                    <option value="">-- nessuna --</option>
                    @foreach($categories as $category)
                    <option @if(old('category_id',$post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <small id="helpCategory" class="form-text text-muted">Seleziona la categoria</small>
                @error('category_id')
                    <div id="category" class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
              </div>

              @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    {{-- all'attribito name aggiungo le parentesi quadre così da associare a tags un array contenente ogni checkbox selezionata --}}
                    <input class="form-check-input" name="tags[]" @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->all()))) checked @endif type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
              @endforeach

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