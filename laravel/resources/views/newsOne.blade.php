@extends('layouts.main')
@extends('menu')
@extends('header')
@extends('footer')

@section('content')
    <main>
    <h2>{{ $news['title'] }}</h2>
    <p>{{ $news['text'] }}</p>
    </main>
@endsection
