@extends('layouts.app')

@section('title', 'Task List')
@section('navbar-title', 'Task List')

@section('content')
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Assigned To</th>
            <th>Assigned By</th>
        </tr>
    </thead>
    <tbody>
        <!-- Populate with tasks -->
    </tbody>
</table>
@endsection