@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
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
        <div class="form-floating mb-3">
            <p class="form-control">{{ $user->name }}</p>
            <label for="userName">{{ __('Full Name') }}</label>
        </div>
        <div class="form-floating mb-3">
            <p class="form-control">{{ $user->email }}</p>
            <label for="userEmail">{{ __('Email') }}</label>
        </div>
        <div class="form-floating mb-3">
            <p class="form-control">{{ $user->created_at->format('d/m/Y') }}</p>
            <label for="userName">{{ __('Created At') }}</label>
        </div>

        <form class="form-floating" action="{{ url('admin/update-user/' . $user->id) }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <select class="form-select" name="role_as" id="floatingSelectGrid"
                    aria-label="Floating label select example ">
                    <option>------- Select Role --------</option>
                    <option {{ $user->role_as == 1 ? 'selected' : '' }} value="1">Admin</option>
                    <option {{ $user->role_as == 0 ? 'selected' : '' }} value="0">User</option>
                    <option {{ $user->role_as == 2 ? 'selected' : '' }} value="2">Blogger</option>
                </select>
                <label for="floatingSelectGrid">Role</label>
            </div>
            <div class="my-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection
