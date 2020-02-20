@extends('layouts.main')
@extends('menu.mainMenu')
@extends('layouts.header')
@extends('layouts.footer')

@section('title')
    Новости {{ $news['title'] }}
@endsection

@section('content')
    <main>
        <h2>{{ $news['title'] }}</h2>
        <p>{{ $news['text'] }}</p>
    </main>
@endsection
