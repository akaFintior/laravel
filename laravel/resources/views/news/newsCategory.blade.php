@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('menu.mainMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Категории новостей</h2>
        <div class="row justify-content-center">
            @forelse($categories as $item)
                <div class="col-md-4 card">
                    <div class="card-body">
                        <h2>{{ $item->name }}</h2>
                        <a href="{{ route('news.categoryId', $item->id) }}">Смотреть новости...</a>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection
