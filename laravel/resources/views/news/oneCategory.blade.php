@extends('layouts.main')
@extends('menu.mainMenu')
@extends('layouts.header')
@extends('layouts.footer')

@section('title')
    {{ $category }}
@endsection

@section('content')
    <main>
        <h2>Новости по категории {{ $category }}</h2>
        @forelse($news as $item)
            <div>
                <h2>{{ $item['title'] }}</h2>
                @if (!$item['isPrivate'])
                    <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a>
                @endif
            </div>
            <hr>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </main>
@endsection
