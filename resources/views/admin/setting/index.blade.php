@extends('layouts.master')
@section('title', 'Settings')
@section('content')
    <!-- Page Heading -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Post</h1>
    </div>

    <div class="post-form">
        <form class="form-floating" action="{{ url('admin/settings') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" id="websiteName" type="text" name="websiteName" @if ($setting) value="{{$setting->website_name}}" @endif placeholder="Enter website Name">
                <label for="websiteName">Enter website Name</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="websiteLogo">Choose Logo</label>
                <input class="form-control" id="websiteLogo" type="file" name="websiteLogo"  placeholder="Select Image">
            </div>
            <div class="mb-3">
                <label class="form-label" for="websiteFavicon">Choose Favicon</label>
                <input class="form-control" id="websiteFavicon" type="file" name="websiteFavicon" placeholder="Select Image">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="websiteDescription" id="websiteDescription" placeholder="Enter Description"
                    style="height: 100px"></textarea>
                <label for="websiteDescription">Enter Description</label>
            </div>
            <hr>
            <h5>SEO Tags</h5>
            <div class="form-floating mb-3">
                <input class="form-control" id="websiteMetaTitle" type="text" name="meta_title"
                    placeholder="Enter Meta Title">
                <label for="websiteMetaTitle">Enter Meta Title</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="websiteMetaDescription" type="text" name="meta_description"
                    placeholder="Enter Meta Description">
                <label for="websiteMetaDescription">Enter Meta Description</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="websiteMetaKeywords" type="text" name="meta_keyword"
                    placeholder="Enter Meta Keywords">
                <label for="websiteMetaKeywords">Enter Meta Keywords</label>
            </div>
            <button type="submit" class="btn btn-primary mb-3 mx-auto">Save Settings</button>
        </form>
    </div>
@endsection
