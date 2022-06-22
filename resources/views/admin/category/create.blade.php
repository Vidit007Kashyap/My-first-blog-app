@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif
    <div class="category-form">
        <form class="form-floating" action="{{ url('admin/add-category') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" id="categoryName" type="text" name="name" placeholder="Enter Category Name">
                <label for="categoryName">Enter Category Name</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="categorySlug" type="text" name="slug" placeholder="Enter Slug">
                <label for="categorySlug">Enter Slug</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="categoryDescription" type="text" name="description"
                    placeholder="Enter Description">
                <label for="categoryDescription">Enter Description</label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="categoryImage">Select Image</label>
                <input class="form-control" id="categoryImage" type="file" name="image" placeholder="Select Image">
            </div>
            <hr>
            <h5>SEO Tags</h5>
            <div class="form-floating mb-3">
                <input class="form-control" id="categoryMetaTitle" type="text" name="meta_title"
                    placeholder="Enter Meta Title">
                <label for="categoryMetaTitle">Enter Meta Title</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="categoryMetaDescription" type="text" name="meta_description"
                    placeholder="Enter Meta Description">
                <label for="categoryMetaDescription">Enter Meta Description</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="categoryMetaKeywords" type="text" name="meta_keyword"
                    placeholder="Enter Meta Keywords">
                <label for="categoryMetaKeywords">Enter Meta Keywords</label>
            </div>
            <hr>
            <h5>Status Mode</h5>
            <div class="my-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <input class="form-check-input" id="navbarStatus" type="checkbox" name="navbar_status">
                            <label for="navbarStatus">Navbar Status</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-check-input" id="categoryStatus" type="checkbox" name="status">
                            <label for="categoryStatus">Hidden</label>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
