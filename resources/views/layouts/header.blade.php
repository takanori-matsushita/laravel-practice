<header>
  <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href={{route('root')}} id="logo">Sample app</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href={{route('root')}} class="nav-link">Home</a></li>
        <li class="nav-item"><a href={{route('help')}} class="nav-link">Help</a></li>
        @auth
        <li class="nav-item dropdown" dusk="Users">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Users
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('users.show', ["user"=> Auth::id()])}}">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <form action="{{route('logout')}}" method="post">
              @csrf
              <button type="submit" class="dropdown-item" dusk="Logout">Logout</button>
            </form>
          </div>
        </li>
        @else
        <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
        @endauth
      </ul>
    </div>
  </nav>
</header>