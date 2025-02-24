@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Users Management</h1>
    <form action="{{ isset($user) ? url('update-user') : url('create-user') }}" method="POST">
        @csrf
        @if(isset($user))
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ isset($user) ? 'New Password (optional)' : 'Password' }}</label>
            <input type="password" class="form-control" id="password" name="password" {{ isset($user) ? '' : 'required' }}>
        </div>
        <button type="submit" class="btn btn-{{ isset($user) ? 'success' : 'primary' }}">
            {{ isset($user) ? 'Update User' : '+ Add User' }}
        </button>
    </form>

    <hr>

    <h2>Users List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ url('delete-user/'.$user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">🗑 Delete</button>
                    </form>
                    <a href="{{ url('edit-user/'.$user->id) }}" class="btn btn-info">ℹ Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
