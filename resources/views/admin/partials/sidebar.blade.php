<div class="sidebar" data-color="azure" data-background-color="white">
    <div class="logo">
        <a href="http://www.pixelseg.com" class="simple-text logo-mini">
            <img src="{{ asset('images/logo/logo Pixels.png') }}" class="img-fluid" width="80" alt="Pixels" />
        </a>
        <a href="http://www.pixelseg.com" class="simple-text logo-normal">
            Pixels EG 2021
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item @if(Route::is('admin.dashboard')) active @endif">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item @if(Route::is('admin.sections')) active @endif  ">
                <a class="nav-link" href="{{ route('admin.sections') }}">
                    <i class="material-icons">home</i>
                    <p>Sections</p>
                </a>
            </li>
            <li class="nav-item @if(Route::is('blogs.index')) active @endif  ">
                <a class="nav-link dropdown-toggle" href="{{ route('blogs.index') }}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">home</i>
                    <p class="d-inline-block">Blogs</p>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('blogs.index') }}">Show Articles</a>
                    <a class="dropdown-item" href="{{ route('blogs.create') }}">Create Article</a>
                </div>
            </li>

            <li class="nav-item @if(Route::is('courses.index')) active @endif  ">
                <a class="nav-link dropdown-toggle" href="{{ route('courses.index') }}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">home</i>
                    <p class="d-inline-block">Courses</p>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('courses.index') }}">Show Courses</a>
                    <a class="dropdown-item" href="{{ route('courses.create') }}">Create Course</a>
                </div>
            </li>

            <li class="nav-item @if(Route::is('projects.index')) active @endif  ">
                <a class="nav-link dropdown-toggle" href="{{ route('projects.index') }}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">home</i>
                    <p class="d-inline-block">Projects</p>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('projects.index') }}">Show Projects</a>
                    <a class="dropdown-item" href="{{ route('projects.create') }}">Create Project</a>
                </div>
            </li>

            <!-- your sidebar here -->
        </ul>
    </div>
</div>
