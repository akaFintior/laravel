@extends('layouts.app')

@section('title', 'Категории')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Категории новостей</h2>
        <div class="row justify-content-center">
            @forelse($categories as $item)
                <div class="col-md-4 card">
                    <div class="card-body">
                        <h2>{{ $item->category }}</h2>
                        <div class="card-img"
                             style="background-image: url({{ $item->image }})"></div>
                        <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin.categories.edit', $item) }}">
                                <button type="button" class="btn btn-success">Изменить категорию</button>
                            </a>
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
        <div class="row justify-content-center">
            <a href="{{ route('admin.categories.create') }}">
                <button type="button" class="btn btn-success">Добавить категорию</button>
            </a>
        </div>
    </div>
@endsection
