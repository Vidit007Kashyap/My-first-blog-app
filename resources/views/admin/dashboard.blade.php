@extends('layouts.master')
@section('title','Blog Dashboard')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="data">
        <h3>Users : {{$users}}</h3>
        <h3>Categories : {{$categories}}</h3>
        <h3>Posts : {{$posts}}</h3>
        <h3>Admins : {{$admins}}</h3>
        <h3>Bloggers : {{$bloggers}}</h3>
    </div>
@endsection