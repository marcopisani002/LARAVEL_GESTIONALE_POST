@extends('layouts.admin')

@php
  $title = 'Modifica post #' . $post->id;
@endphp

@section('title', $title)

@section('content')
  <h1>{{ $title }}</h1>

  {{-- Form per la creazione --}}
  <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" class="form-control bg-secondary my-whit @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}">
      @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label ">Contenuto</label>
      <textarea name="content" cols="30" rows="5" class="form-control bg-secondary my-whit @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
      @error('content')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Immagine di copertina</label>
      <input type="text" class="form-control bg-secondary my-whit @error('cover_img') is-invalid @enderror" name="cover_img" value="{{ old('cover_img', $post->cover_img) }}">
      @error('cover_img')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="mb-3 form-check form-switch">
      <input class="form-check-input  my-whit" type="checkbox" role="switch" id="switch_public" name="public"
        {{ old('public', $post->public) ? 'checked' : '' }}>
      <label class="form-check-label" for="switch_public">Post publico</label>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annulla</a>
    <button class="btn btn-primary">Salva</button>
  </form>

@endsection
