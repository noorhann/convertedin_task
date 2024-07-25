<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <nav>
                <ul>
                    <li><a href="{{ route('tasks.create') }}">Create Task</a></li>
                    <li><a href="{{ route('tasks.index') }}">Task List</a></li>
                    <li><a href="{{ route('statistics.index') }}">Statistics</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <header class="navbar">
                <h1>@yield('navbar-title')</h1>
            </header>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>