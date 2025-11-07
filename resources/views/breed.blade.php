@extends('layouts.app')

@section('title', 'Pet Overview')

@push('style')
    <style>
        .card-text {
            text-align: left;
        }
    </style>
@endpush

@section('content')
    <a href="{{ route('dashboard') }}">« Back</a>

    <h3 class="typewriter mb-4">
        <span id="typewriterText">{{ $breed->name }}</span>
    </h3>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                @isset($image)
                    <img src="{{ $image->url }}" class="img-fluid rounded-start" alt="{{ $breed->name }}">
                @endisset
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><strong>Name:</strong> {{ $breed->name }}</p>
                    @isset($breed->description)
                        <p class="card-text"><strong>Description:</strong> {{ $breed->description }}</p>
                    @endisset
                    @isset($breed->origin)
                        <p class="card-text"><strong>Origin:</strong> {{ $breed->origin }}</p>
                    @endisset
                    @isset($breed->temperament)
                        <p class="card-text"><strong>Temperament:</strong> {{ $breed->temperament }}</p>
                    @endisset
                    @isset($breed->lifeSpan)
                        <p class="card-text"><strong>Life span:</strong> {{ $breed->lifeSpan }} years</p>
                    @endisset
                    @isset($breed->wikipediaUrl)
                        <p class="card-text"><strong>Wikipedia URL:</strong> <a href="{{ $breed->wikipediaUrl }}">{{ $breed->wikipediaUrl }}</a></p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
