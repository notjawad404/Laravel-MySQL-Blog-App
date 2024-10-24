<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('posts.index') }}" class="w-25 h-25">
      <img src="https://www.freeiconspng.com/uploads/blogger-logo-icon-png-22.png" alt="Logo" class="h-25 w-25">
    </a>

    <!-- Hamburger button for small screens -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left side: Links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}" href="{{ route('posts.index') }}">{{ __('Home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('posts.userposts') ? 'active' : '' }}" href="{{ route('posts.userposts') }}">{{ __('My Posts') }}</a>
        </li>
      </ul>

      <!-- Right side: Authentication Links -->
      <ul class="navbar-nav ms-auto">
        @auth
        <!-- Authenticated user dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <!-- Login and Register links -->
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
