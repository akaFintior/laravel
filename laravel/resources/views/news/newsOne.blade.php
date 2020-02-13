@extends('layouts.main')
@extends('menu')
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
    <main>
        <h2>{{ $news['title'] }}</h2>
        <p>{{ $news['text'] }}</p>
    </main>
@endsection
