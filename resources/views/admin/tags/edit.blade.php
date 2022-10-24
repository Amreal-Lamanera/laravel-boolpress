@extends('layouts.app')

@section('content')

<div class="container">
    <form action=" {{ route('admin.tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome nuovo tag" value="{{ old('name', $tag->name) }}">
          @error('name')
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