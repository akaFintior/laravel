@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Добро пожаловать Admin!</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($news as $item)
                <div class="col-md-6 card">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>
                        <div class="card-img"
                             style="background-image: url({{ $item->image ?? asset('img/default.jpg') }})"></div>
                        <a href="{{ route('admin.updateNews', $item) }}"><button type="button" class="btn btn-success">Изменить новость</button></a>
                        <a href="{{ route('admin.deleteNews', $item) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                        <a href="{{ route('news.one', $item->id) }}">Подробнее...</a>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection
