@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Admins Table</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="" disabled>Edit</a>
                        <button class="btn btn-danger btn-sm" disabled>Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $admins->links() }}
    </div>
@endsection
