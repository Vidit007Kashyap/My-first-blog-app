@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Users</h1>
        {{-- <a href="http://localhost:8000/admin/add-post" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Post</a> --}}
    </div>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @for ($i = 0; $i < count($users); $i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $users[$i]->name }}</td>
                                <td>{{ $users[$i]->email }}</td>
                                <td>{{ $users[$i]->role_as == 1 ? 'Admin' : ($users[$i]->role_as == 2 ? 'Blogger':'User') }}</td>
                                <td><a href="{{ url('admin/edit-user/' . $users[$i]->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
