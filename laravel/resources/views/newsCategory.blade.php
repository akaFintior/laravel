@extends('layouts.main')
@extends('menu')

@section('content')
    <h2>{{$category}}</h2>
    @foreach($news as $news)
        <h4><a href="/news/{{$category}}/{{ $news['id'] }}">{{$news['title']}}</a></h4><br>
    @endforeach
@endsection
