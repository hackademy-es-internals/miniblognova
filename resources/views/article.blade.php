<x-layout>
    @if($article->meta)
    <x-slot name="meta">
        @foreach ($article->meta as $key => $meta)
        <meta name="{{$key}}" content="{{$meta}}">
        @endforeach
    </x-slot>
    @endif
    <header class="">
        <div class="container h-75">
            <!-- subnav -->
            <div class="container d-none d-lg-block">
                <div class="col-12">
                    <ul class="d-flex justify-content-evenly list-unstyled text-uppercase py-3 submenu-list">
                        <li class="mx-5 submenu-item"><a class="text-dark text-decoration-none submenu-link"
                                href="">Vegan</a></li>
                        <li class="mx-5 submenu-item"><a class="text-dark text-decoration-none submenu-link"
                                href="">Carnivor</a>
                        </li>
                        <li class="mx-5 submenu-item"><a class="text-dark text-decoration-none submenu-link"
                                href="">Mediterranean</a></li>
                        <li class="mx-5 submenu-item"><a class="text-dark text-decoration-none submenu-link"
                                href="">Japanese</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- main article -->
    <main>
        <article class="container">
            <!-- content sections -->
            <section class="row justify-content-center py-3">
                <div class="col-12 col-lg-8">
                    <img src="{{$article->getFirstMediaUrl('main-image','thumb-cropped')}}"
                        class="img-fluid d-block mx-auto mb-3" alt="">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <button class="btn btn-info px-4 py-2 rounded-0 text-uppercase fw-bold mx-3">FOOD</button>
                        <p class="small text-muted mb-0 mx-3">Posted by {{$article->user->name}}
                            {{$article->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-8 ">
                    {!!$article->description!!}
                </div>
                <div class="col-12 col-lg-8">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($article->getMedia('content-images') as $media)
    
    
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src="{{$media->getUrl('thumb-cropped')}}" class="d-block w-100" alt="...">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                
            </section>
            <!-- related articles section -->
            <section class="container py-3 py-lg-5">
                <div class="row pb-3 pb-lg-5">
                    <div class="col-12">
                        <h2 class="fw-bold border-bottom">See related articles</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4 mb-3 d-flex justify-content-center">
                        <div class="card border-0 rounded-0 shadow-sm">
                            <img src="./media/blog02.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="fw-bold">Pizza Picasso</h5>
                                <p class="fw-light">Some quick example text to build on the card title and make up the
                                    bulk of the
                                    card's content.</p>
                                <div class="d-flex align-items-center">
                                    <div class="box-author">
                                        <p class="mb-0 fw-bold text-info">A</p>
                                    </div>
                                    <p class="text-secondary small mb-0 mx-2">Aron Lennon</p>
                                    <p class="text-secondary small mb-0 mx-2">3 weeks ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3 d-flex justify-content-center">
                        <div class="card border-0 rounded-0 shadow-sm">
                            <img src="./media/blog03.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="fw-bold">Indian Fried Rice</h5>
                                <p class="fw-light">Some quick example text to build on the card title and make up the
                                    bulk of the
                                    card's content.</p>
                                <div class="d-flex align-items-center">
                                    <div class="box-author">
                                        <p class="mb-0 fw-bold text-info">L</p>
                                    </div>
                                    <p class="text-secondary small mb-0 mx-2">Luis Perez</p>
                                    <p class="text-secondary small mb-0 mx-2">3 weeks ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3 d-flex justify-content-center">
                        <div class="card border-0 rounded-0 shadow-sm">
                            <img src="./media/blog04.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="fw-bold">Grilled Cauliflowers</h5>
                                <p class="fw-light">Some quick example text to build on the card title and make up the
                                    bulk of the
                                    card's content.</p>
                                <div class="d-flex align-items-center">
                                    <div class="box-author">
                                        <p class="mb-0 fw-bold text-info">A</p>
                                    </div>
                                    <p class="text-secondary small mb-0 mx-2">Alicia Parker</p>
                                    <p class="text-secondary small mb-0 mx-2">4 weeks ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </article>
        <!-- newsletter section -->
        <section class="container py-3 py-lg-5">
            <div class="row pb-3 pb-lg-5">
                <h2 class="border-bottom fw-bold">Newsletter</h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi voluptatum, alias
                        veritatis mollitia tempore quisquam quo saepe repellendus consectetur iusto, porro neque ipsum
                        labore fugiat
                        autem perspiciatis, ab praesentium? Ipsam.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <form action="">
                        <label for="" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control border-0 border-bottom rounded-0 mb-4">
                        <label for="" class="form-label fw-bold">Message</label>
                        <textarea name="" id="" cols="10" rows="5"
                            class="form-control border-0 border-bottom rounded-0 mb-4"></textarea>
                        <button class="btn btn-dark rounded-0 fw-bold text-uppercase fst-italic">Send It</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-layout>
