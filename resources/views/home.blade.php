@extends('layout')

@section('title', 'SIU Cover Page Generator')

@push('styles')
    <style>
        .carousel-item img {
            height: 100vh;
            object-fit: cover;
            filter: brightness(50%);
        }

        .carousel-caption {
            top: 40%;
            transform: translateY(-50%);
            bottom: initial !important;
        }

        .hero-text-shadow {
            text-shadow: 8px 4px 12px rgba(0, 0, 0, 0.9);
        }

        .feature-card {
            transition: transform 0.3s;
            border-radius: 15px;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        @media (max-width: 768px) {
            .carousel-caption h1 {
                font-size: 1.8rem;
            }

            .carousel-caption p {
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    @include('partials.hero')
    @include('partials.features')
@endsection
