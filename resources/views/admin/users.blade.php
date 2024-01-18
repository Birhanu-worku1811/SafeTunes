@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2>Users Table</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->role == 1)
                        Admin
                    @elseif($user->role == 2)
                        Editor
                    @else
                        User
                    @endif
                </td>
                <td>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
