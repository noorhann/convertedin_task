<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
                    <div class="container d-flex justify-content-between align-items-center">
                        <h1 class="m-0">@yield('header')</h1>

                        @guest
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        @else
                        <form action="{{ url('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        @endguest
                    </div>
            </header>

            <main>
                @yield('content')
            </main>

        </div>
    </div>
</body>

</html>