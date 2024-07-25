@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="form-container">
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <!-- Display errors -->
        @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors')->first('error') }}
        </div>
        @endif
    </form>
</div>
@endsection