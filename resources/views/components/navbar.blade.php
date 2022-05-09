<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top text-uppercase py-3">
  <div class="container-fluid">
    <a class="navbar-brand text-uppercase fw-bold" href="/">Delicious World</a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidemenu"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-none d-lg-block" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(auth()->user()->isAdmin() || auth()->user()->isRevisor())
            <li><a class="dropdown-item" href="/admin">Admin</a></li>
            @endif
            <li><a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Logout</a></li>
            <form id="form-logout" action="{{route('logout')}}" method="POST">@csrf</form>
          </ul>
        </li>
        @endauth
        @guest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Enter
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
          </ul>
        </li>
        @endguest
        <li class="nav-item mx-3">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link" href="#">Work with us</a>
        </li>
      </ul>
    </div>
    <div class="offcanvas offcanvas-start d-block d-lg-none" tabindex="-1" id="sidemenu"
      aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
          aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>