@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>User Management</h2>
    <!-- Button to Add New User -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-success">Add New User</a>
    </div>

    <!-- User List -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Telephone</th>
                <th>Type</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u['id'] }}</td>
                <td>{{ $u['first_name'] }}</td>
                <td>{{ $u['last_name'] }}</td>
                <td>{{ $u['telephone'] }}</td>
                <td>{{ $u['type'] }}</td>
                <td>{{ $u['email'] }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('users.edit', $u['id']) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('products.destroy', $u['id']) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
