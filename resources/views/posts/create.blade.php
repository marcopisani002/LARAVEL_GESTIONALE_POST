@extends('layouts.admin')

@php
    $title = 'CREATE post';
@endphp

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    {{-- Se abbiamo degli errori di validazione, mostriamo un alert con questi errori
    $errors->any() - Ritorna un booleano
    $errors->all() - Ritorna un array numerico di strighe, dove ogni stringa è un errore
    --}}
    <form action="{{ route('posts.store') }} " method="POST">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Titolo</label>
            <textarea class="form-control" name="content" cols="30" rows="10"> </textarea>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Immagine di copertina</label>
          <input type="text" class="form-control" name="cover_img">
      </div>
      <div class="mb-3 form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switch_public" name="public"
          {{ old('public', 1) ? 'checked' : '' }} value="1">
        <label class="form-check-label" for="switch_public">Post publico</label>
      </div>
        



        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annulla</a>
        <button class=" btn btn-primary">salva</button>
    </form>

@endsection
