@extends('layouts.admin')

@php
  $title = 'Post #' . $post->id;
@endphp

@section('title', $title)

@section('content')
  <h1>{{ $title }}</h1>

  @if (session('status') === 'success')
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <div class="card">
    {{-- Se cover_img esiste, mostra un tag img, altrimenti nulla --}}
    @if ($post->cover_img)
      <img src="{{ $post->cover_img }}" alt="" class="card-img-top">
    @endif

    <div class="card-body">
      <div class="card-title">{{ $post->title }}</div>
      <p class="card-text">{{ $post->content }}</p>
      <div><strong>Publico:</strong> {{ $post->public ? 'Si' : 'No' }} </div>
      <div><strong>Stato:</strong> {{ $post->status }} </div>
    </div>
  </div>

@endsection
