@extends('layouts.app')

@section('title', 'Create Task')
@section('navbar-title', 'Create Task')

@section('content')
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="assigned_by_id">Admin Name</label>
    <select name="assigned_by_id" id="assigned_by_id">
        <!-- Populate with admins -->
    </select>

    <label for="title">Title</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Description</label>
    <textarea name="description" id="description" required></textarea>

    <label for="assigned_to_id">Assigned User</label>
    <select name="assigned_to_id" id="assigned_to_id">
        <!-- Populate with users -->
    </select>

    <button type="submit">Create Task</button>
</form>
@endsection