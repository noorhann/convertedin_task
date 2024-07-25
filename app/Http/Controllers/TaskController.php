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
        $admins = $this->userService->getAdmins();
        $users = $this->userService->getNonAdminUsers();
        return view('tasks.create', compact('admins', 'users'));
    }


    public function store(StoreTaskRequest $request)
    {   
        Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
}
