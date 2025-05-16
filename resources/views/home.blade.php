@extends('layout')

@section('title', 'Inicio')

@section('content')
        <!-- Slider PRINCIPAL -->
         <section class="w-full">
            @include('homeSections.slider')
        </section>
        <!-- Menu PRINCIPAL -->
        <section class="w-full max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-24 my-12">
            @include('homeSections.menu')
        </section>
        <!-- Populares PRINCIPAL -->
        <section class="w-full bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-8">
                @include('homeSections.populars')
            </div>
        </section>
        <!-- Reviews PRINCIPAL -->
        <section class="w-full mt-20">
                @include('homeSections.reviews')
        </section>
        <!-- Nueva Review PRINCIPAL -->
        @include('homeSections.newreview')
@endsection

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/nav.js') }}"></script>
    <script type="module" src="{{ Vite::asset('resources/js/slider.js') }}"></script>
    <script type="module" src="{{ Vite::asset('resources/js/reviews.js') }}"></script>
@endpush