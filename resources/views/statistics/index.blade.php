@extends('layouts.app')

@section('title', 'User Task Statistics')
@section('navbar-title', 'User Task Statistics')

@section('content')
<div class="container">
    <h1 class="mb-4">Top 10 Users with the Highest Task Count</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Task Count</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($statistics as $statistic)
            <tr>
                <td>{{ $statistic->user->name }}</td> 
                <td>{{ $statistic->task_count }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection