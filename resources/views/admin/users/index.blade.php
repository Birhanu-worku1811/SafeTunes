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
                        @if($user->artist_id)
                            Artist
                        @else
                            User
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user->id)}}">Edit</a>
                        <button class="btn btn-danger btn-sm" disabled>Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->onEachSide(1)->links()}}
    </div>
@endsection
