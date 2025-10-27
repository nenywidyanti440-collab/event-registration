<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">EventReg</a>
        <div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('events.index') }}" class="nav-link">Events</a></li>
                @if(session('is_admin'))
                    <li class="nav-item"><a href="{{ route('admin.events.index') }}" class="nav-link">Admin</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
