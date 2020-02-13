@extends('layouts.main')
@extends('menu')
@extends('header')
@extends('footer')

@section('content')
    <main>
    @foreach($categories as $category)
        <h2><a href="{{ route('categNews', $category) }}">{{$category}}</a></h2><br>
    @endforeach
    </main>
@endsection
