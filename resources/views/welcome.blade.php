<x-layout title="{{$title}}" >
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-12 col-lg-4">
            <div class="card" style="width: 18rem;">
                {{$article->getFirstMedia('main-image')}}
                <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route('articles.show',['id'=>$article->id])}}" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
   
</x-layout>