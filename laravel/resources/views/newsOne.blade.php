@extends('layouts.main')
@extends('menu')

@section('content')
    <h2>{{ $news['title'] }}</h2>
    <p>{{ $news['text'] }}</p>
@endsection
