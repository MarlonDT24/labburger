@extends('layout')

@section('title', 'Inicio')

@section('content')
    <main class="flex-1">
        <!-- Slider PRINCIPAL -->
         <section class="w-full">
            @include('homeSections.slider')
        </section>
        <!-- Menu PRINCIPAL -->
        <section class="w-full max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-24">
            @include('homeSections.menu')
        </section>
        <!-- Populares PRINCIPAL -->
        <section class="w-full bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-24">
                @include('homeSections.populars')
            </div>
        </section>
        <!-- Reviews PRINCIPAL -->
        <section class="w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-24">
                @include('homeSections.reviews')
            </div>
        </section>
        <!-- Nueva Review PRINCIPAL -->
        <section class="w-full bg-gray-100">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 md:px-12 lg:px-24 py-12">
                @include('homeSections.newreview')
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/nav.js') }}"></script>
    <script type="module" src="{{ Vite::asset('resources/js/slider.js') }}"></script>
@endpush