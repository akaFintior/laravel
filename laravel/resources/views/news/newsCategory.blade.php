@extends('layouts.main')
@extends('menu.mainMenu')
@extends('layouts.header')
@extends('layouts.footer')

@section('title')
    Категорий
@endsection

@section('content')
    <main>
        <h2>Категории новостей</h2>
        @forelse($categories as $item)
            <div>
                <h2><a href="{{ route('news.categoryId', $item['name']) }}">{{ $item['category'] }}</a></h2>
            </div>
        @empty
            <p>Нет категорий</p>
        @endforelse
    </main>
@endsection