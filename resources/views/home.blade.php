@extends('layout')

@section('content')
    <div id="carouselHome" class="carousel carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="6" aria-label="Slide 7"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/1.jpg')}}" class="d-block w-100" alt="...">
{{--                <div class="carousel-caption d-none d-md-block">--}}
{{--                    <h5>First slide label</h5>--}}
{{--                    <p>Some representative placeholder content for the first slide.</p>--}}
{{--                </div>--}}
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/3.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/4.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/5.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/6.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="{{asset('storage/home/carousel/7.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
    </div>

@endsection

@push('page-script')
    <script src="{{asset('js/manifests/homeManifest.js')}}"></script>
@endpush
