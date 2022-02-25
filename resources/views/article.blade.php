<x-layout>
@if($article->meta)
<x-slot name="meta">
    @foreach ($article->meta as $key => $meta)
         <meta name="{{$key}}" content="{{$meta}}">
    @endforeach
</x-slot>
@endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{$article->title}}</h1>
            {!!$article->description!!}
        </div>
        @foreach ($article->getMedia('content-images') as $media)
        <div class="col-12 col-lg-4 my-img">
            {{$media}}
        </div>
        @endforeach
        </div>
    </div>
</div>
</x-layout>