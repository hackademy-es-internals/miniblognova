<x-layout>
<header class="head-bg">
    <div class="container h-75">
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
      <div class="container h-100">
        <div class="row h-100 text-white text-center align-items-center">
          <div class="col-12">
            <h1 class="display-1 fw-bold">Delicious World</h1>
            <h2 class="fw-lighter">All the best recipes from Michelin Chefs</h2>
          </div>
        </div>
      </div>
    </div>
</header>
<main>
    <!-- articles section -->
    <section class="container my-3 py-3 my-lg-5 py-lg-5">
      <div class="row pb-2 pb-lg-5">
        <div class="col-12">
          <h2 class="border-bottom fw-bold">Recent Articles</h2>
        </div>
      </div>
      @foreach ($articles as $article)
      <!-- article 1 -->
      <article class="row justify-content-center pb-5 pb-lg-5">
        <div class="col-12 col-lg-9">
          <div class="card mb-3 border-0">
            <div class="row g-0">
              <div class="d-none d-lg-block col-lg-3">
                <img src="{{$article->getFirstMediaUrl('main-image')}}" class="img-fluid" alt="...">
              </div>
              <div class="col-12 col-lg-9 d-flex align-items-center">
                <div class="card-body">
                  <h4 class="fw-bold">{{$article->title}}</h4>
                  <p class="lead">This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.</p>

                  <div class="d-flex align-items-center">
                    <div class="box-author">
                      <p class="mb-0 fw-bold text-info">J</p>
                    </div>
                    <div class="mx-2">
                      <p class="text-secondary small mb-0">{{$article->user->name}}</p>
                      <p class="text-secondary small mb-0">{{$article->created_at->diffForHumans()}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 text-end btn-read py-2">
                <a href="{{route('articles.show',$article->id)}}" class="btn btn-dark rounded-0 fw-bold px-4 py-2 text-uppercase fst-italic">Read
                  It</a>
              </div>
            </div>
          </div>
        </div>
      </article>
      @endforeach
    </section>
    <!-- newsletter section -->
    <section class="container my-3 py-3 my-lg-5 py-lg-5">
      <div class="row pb-3 pb-lg-5">
        <h2 class="border-bottom fw-bold">Newsletter</h2>
      </div>
      <div class="row px-3">
        <div class="col-12 col-lg-6">
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi voluptatum, alias
            veritatis mollitia tempore quisquam quo saepe repellendus consectetur iusto, porro neque ipsum labore fugiat
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