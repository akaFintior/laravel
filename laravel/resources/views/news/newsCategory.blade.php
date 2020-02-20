@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('menu.mainMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Категории новостей</h2>
            @forelse($categories as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item['category'] }}</h2>
                        <a href="{{ route('news.categoryId', $item['name']) }}">Смотреть новости...</a>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection
