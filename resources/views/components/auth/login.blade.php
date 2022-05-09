<x-layout>
    <x-slot name="title">Login</x-slot>
    <header class="head-bg">
        <div class="container vh-100">
          <!-- subnav -->
          <div class="container d-none d-lg-block">
            <div class="col-12">
              <ul class="d-flex justify-content-evenly list-unstyled text-uppercase py-3 submenu-list">
                <li class="mx-5 submenu-item"><a class="text-white text-decoration-none submenu-link" href="">Vegan</a></li>
                <li class="mx-5 submenu-item"><a class="text-white text-decoration-none submenu-link" href="">Carnivor</a>
                </li>
                <li class="mx-5 submenu-item"><a class="text-white text-decoration-none submenu-link"
                    href="">Mediterranean</a></li>
                <li class="mx-5 submenu-item"><a class="text-white text-decoration-none submenu-link" href="">Japanese</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- title -->
          @if ($errors->any())
            <div class="row justify-content-center align-items-center" id="alert">
                <div class=" alert alert-fixed bg-alert">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="container w-50 mx-auto text-white h-75">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Inserisci email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" value="{{old('password')}}" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2 d-md-flex align-items-baseline">
                    <button class="btn btn-dark rounded-0 fw-bold px-4 py-2 text-uppercase fst-italic" type="submit">Login</button>
                    <p>or <a href="{{route('register')}}">Register</a>!</p>
                </div>
            </form>
        </div>
        </div>
    </header>
    <section class="bg-image">

        @if ($errors->any())
            <div class="row justify-content-center align-items-center" id="alert">
                <div class=" alert alert-fixed bg-alert">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="container w-50 mx-auto" style="min-height: 75vh; margin-top: 15vh">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Inserisci email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" value="{{old('password')}}" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2 d-md-flex align-items-baseline">
                    <button class="btn btn-dark rounded-0 fw-bold px-4 py-2 text-uppercase fst-italic" type="submit">Login</button>
                    <p>or <a href="{{route('register')}}">Register</a>!</p>
                </div>
            </form>
        </div>
        
    </section>
</x-layout>