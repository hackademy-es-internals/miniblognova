<x-layout>
    <x-slot name="title">registrati</x-slot>
  
    <section class="bg-image">


    @if ($errors->any())
        <div class="row justify-content-center align-items-center"  id="alert">
            <div class=" alert  alert-fixed bg-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <div class="container mx-auto w-50 " style="margin-top: 15vh; min-height:75vh">
    <h2>Register</h2>
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Email">
                <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Insert name">
                <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" value="{{old('password')}}" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                <input type="password" class="form-control" value="{{old('password_confirmation')}}" name="password_confirmation" id="floatingPassword" placeholder="Confirm password">
                <label for="floatingPassword">Confirm Password</label>
                </div>
                <button class="btn btn-dark rounded-0 fw-bold px-4 py-2 text-uppercase fst-italic" type="submit">Registrate</button>
            </div>
        </form>
    </section>
</x-layout>