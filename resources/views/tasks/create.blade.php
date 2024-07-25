@extends('layouts.app')

@section('title', 'Create Task')
@section('navbar-title', 'Create Task')

@section('content')
<div class="form-container">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <!-- Admin Name -->
        <div class="form-group">
            <label for="assigned_by_id">Admin Name</label>
            <input name="assigned_by_id" id="assigned_by_id" class="form-control" value="{{auth()->user()->name}}" readonly>
            @error('assigned_by_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Title -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Assigned User -->
        <div class="form-group">
            <label for="assigned_to_id">Assigned User</label>
            <select name="assigned_to_id" id="assigned_to_id" class="form-control">
                @foreach ($users as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            @error('assigned_to_id')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Task</button>
        </div>
    </form>
</div>
@endsection