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

            <!-- your sidebar here -->
        </ul>
    </div>
</div>
