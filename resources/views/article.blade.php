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
    </div>
</div>
</x-layout>