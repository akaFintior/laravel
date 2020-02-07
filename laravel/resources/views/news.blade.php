@extends('layouts.main')
@extends('menu')

@section('content')
    @foreach($categories as $category)
        <h2><a href="/news/{{ $category }}">{{$category}}</a></h2><br>
    @endforeach
@endsection
