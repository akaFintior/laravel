@extends('layouts.main')
@extends('menu')
@extends('header')
@extends('footer')

@section('content')
    <main>
    <h2>{{$category}}</h2>
    @foreach($news as $news)
        <h4><a href="/news/{{$category}}/{{ $news['id'] }}">{{$news['title']}}</a></h4><br>
    @endforeach
    </main>
@endsection
