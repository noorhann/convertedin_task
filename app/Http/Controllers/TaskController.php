<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\UserService;

class TaskController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $tasks = Task::paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = $this->userService->getNonAdminUsers();
        return view('tasks.create', compact('users'));
    }


    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
        $validated['assigned_by_id'] = auth()->user()->id; 

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
}
