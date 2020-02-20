@extends('layouts.app')

@section('title', $category )

@section('menu')
    @include('menu.mainMenu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Новости по категории {{ $category }}</h2>
            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item['title'] }}</h2>
                        @if (!$item['isPrivate'])
                            <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a>
                        @endif
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection
