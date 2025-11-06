@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form class="d-flex justify-content-center w-100" style="max-width: 800px;">
        <div class="position-relative w-100">
            <input id="searchInput" class="form-control me-2 rounded-5 form-control-lg" type="search" placeholder="Search" aria-label="Search">
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>

    <table id="breeds-table" class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Breed</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($breeds as $breed)
            <tr data-row-name="{{ $breed->name }}" style="display: none">
                <th scope="row">{{ $breed->id }}</th>
                <td>{{ $breed->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const breedsTableRows = [...document.querySelectorAll('#breeds-table tbody tr')];

            searchInput.focus();

            /**
             * Decided to use straightforward JS to handle the filter logic. Didn't see the need to use anything more
             * advanced (Vue.js, Alpine.js etc)
             */
            searchInput.addEventListener('keyup', (event) => {
                const value = event.target.value.toLowerCase();

                breedsTableRows.forEach((row) => {
                    row.style.display = row.dataset.rowName.toLowerCase().indexOf(value) > -1
                        ? 'table-row'
                        : 'none';
                })
            });

            const titles = [
                "Looking for a Dog Breed?",
                "Searching for a Cat Breed?",
                "What Dog Breed Fits You?",
                "Find Your Perfect Feline Companion",
                "Explore Cat Breeds by Trait",
                "Discover Rare Dog Breeds",
                "Which Breed is Right for Your Family?",
                "Find Cat Breeds with Unique Traits",
                "Discover Dogs by Size and Temperament"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });
    </script>
@endpush
