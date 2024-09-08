@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Editing the user</h2>

      @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>

      @endif
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group mb-3">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required>

        </div>
        <div class="form-group mb-3">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" required>
        </div>
        <div class="form-group mb-3">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone"value="{{$user->telephone}}" required>
        </div>
        <div class="form-group mb-3">
            <label for="type">Type:</label>
            <select class="form-control" id="type" name="type" required>
                <option value="admin" {{ $user->type === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="supplier" {{ $user->type === 'supplier' ? 'selected' : '' }}>Supplier</option>
                <option value="customer" {{ $user->type === 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group mb-3">
            <label for="password">Confirm password:</label>
            <input type="password" class="form-control" id="password" name="confirm_password">
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
