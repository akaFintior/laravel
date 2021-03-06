@extends('layouts.app')

@section('title', $category )

@section('menu')
    @include('menu.mainMenu')
@endsection


@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Новости по категории {{ $category }}</h2>
        <div class="row justify-content-center">
            @forelse($news as $item)
                <div class="col-md-6 card">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>
                        <div class="card-img"
                             style="background-image: url({{ $item->image ?? asset('img/default.jpg') }})"></div>
                        @if (!$item->isPrivate)
                            <a href="{{ route('news.one', $item->id) }}">Подробнее...</a>
                        @endif
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
        {{ $news->links() }}
    </div>
@endsection
