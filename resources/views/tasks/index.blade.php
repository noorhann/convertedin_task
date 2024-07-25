@extends('layouts.app')

@section('title', 'Tasks List')
@section('navbar-title', 'Tasks List')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned User</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->assignedUser->name }}</td>
                <td>{{ $task->assignedBy->name }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No tasks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    

    <div class="paginate-links">
        {{ $tasks->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
    </div>
    <br>
    <div>
        <input type="hidden" value="{{$tasks->currentPage()}}" id="currentPage">
        page {{$tasks->currentPage()}} of {{$tasks->lastPage()}}
    </div>
</div>
@endsection