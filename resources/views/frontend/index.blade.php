@extends('layouts.app')
@section('navbar')
    @include('layouts.inc.frontend-navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="categories-slider swiper-container overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide">
                                <div class="card border-primary">
                                    <img class="card-img-top img-fluid"
                                        src="{{ asset('uploads/category/' . $category->image) }}"
                                        alt="{{ $category->name }}">
                                    <div class="card-body">
                                        <a class="text-decoration-none" href="{{ url('tutorial/' . $category->slug) }}">
                                            <h4 class="card-title">{{ $category->name }}</h4>
                                        </a>
                                        <p class="card-text">{{ $category->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="title mb-3">
                    <h3>All Categories</h3>
                </div>
                <div class="categories">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-4">
                                <div class="card text-start">
                                    <div class="card-body">
                                        <a class="text-decoration-none" href="{{ url('tutorial/' . $category->slug) }}">
                                            <h4 class="card-title">{{ $category->name }}</h4>
                                        </a>
                                        {{-- <p class="card-text">Body</p> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5">
                <div class="title mb-3">
                    <h3>Latest Post</h3>
                </div>
                <div class="latest-post">
                        @foreach ($latestPosts as $post)
                            <div class="card text-start">
                                <div class="card-body">
                                    <a class="text-decoration-none"
                                        href="{{ url('tutorial/' . $post->category->slug . '/' . $post->slug) }}">
                                        <h5 class="card-title">{{ $post->name }}</h5>
                                    </a>
                                    {{-- <p class="card-text">Body</p> --}}
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
