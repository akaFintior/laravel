@extends('layouts.app')

@section('title', 'Ресурсы')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Ресурсы новостей</h2>
        <div class="row justify-content-center">
            @forelse($resources as $item)
                <div class="col-md-4 card">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>
                        <form action="{{ route('resources.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('resources.edit', $item) }}">
                                <button type="button" class="btn btn-success">Изменить ресурс</button>
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
            <a href="{{ route('resources.create') }}">
                <button type="button" class="btn btn-success">Добавить ресурс</button>
            </a>
        </div>
    </div>
@endsection
