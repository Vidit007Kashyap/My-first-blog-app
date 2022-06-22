@extends('layouts.app')
@section('title',"$category->meta_title")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-title">
                    <h2>{{ $category->name }}</h2>
                </div>

                @forelse ($post as $postItem)
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <a href="{{ url('tutorial/' . $category->slug . '/' . $postItem->slug) }}">
                                <h2>{{ $postItem->name }}</h2>
                            </a>
                            <h6>Posted On: {{ $postItem->created_at->format('d-m-Y') }}</h6>
                            <h6>Posted By: {{ $postItem->user->name }}</h6>
                        </div>
                    </div>
                @empty
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <h2>No Post available</h2>
                        </div>
                    </div>
                @endforelse
                <div class="paginate mt-4">
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
