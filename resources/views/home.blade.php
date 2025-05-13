@extends('layout')

@section('title', 'Inicio')

@section('content')
    <main class="flex-1">
        <!-- Slider PRINCIPAL -->
        @include('homeSections.slider')
        <!-- Menu PRINCIPAL -->
        @include('homeSections.menu')
        <!-- Populares PRINCIPAL -->
        @include('homeSections.populars')
        <!-- Reviews PRINCIPAL -->
        @include('homeSections.reviews')
        <!-- Crear Review PRINCIPAL -->
        @include('homeSections.newreview')
    </main>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/nav.js') }}"></script>
@endpush