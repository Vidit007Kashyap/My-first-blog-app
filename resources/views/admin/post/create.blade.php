@extends('layouts.master')
@section('title', 'Add Post')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Post</h1>
    </div>

    <div class="post-form">
        <form class="form-floating" action="{{ url('admin/add-post') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <select class="form-select" name="category_id" id="floatingSelectGrid" aria-label="Floating label select example">
                    <option selected>------- Select Category --------</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <label for="floatingSelectGrid">Category</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="postName" type="text" name="name" placeholder="Enter Post Name">
                <label for="postName">Enter Post Name</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="postSlug" type="text" name="slug" placeholder="Enter Slug">
                <label for="postSlug">Enter Slug</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" id="postDescription" placeholder="Enter Description"
                    style="height: 100px"></textarea>
                <label for="postDescription">Enter Description</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="yt_iframe" id="postYT_iframe" type="text"
                    placeholder="Enter Youtube iFrame" />
                <label for="postYT_iframe">Enter Youtube iFrame</label>
            </div>
            <hr>
            <h5>SEO Tags</h5>
            <div class="form-floating mb-3">
                <input class="form-control" id="postMetaTitle" type="text" name="meta_title"
                    placeholder="Enter Meta Title">
                <label for="postMetaTitle">Enter Meta Title</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="postMetaDescription" type="text" name="meta_description"
                    placeholder="Enter Meta Description">
                <label for="postMetaDescription">Enter Meta Description</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="postMetaKeywords" type="text" name="meta_keyword"
                    placeholder="Enter Meta Keywords">
                <label for="postMetaKeywords">Enter Meta Keywords</label>
            </div>
            <hr>
            <h5>Status Mode</h5>
            <div class="my-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <input class="form-check-input" id="postStatus" type="checkbox" name="status">
                            <label for="postStatus" style="user-select: none">Hidden</label>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
