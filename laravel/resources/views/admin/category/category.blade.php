@extends('layouts.app')

@section('title', 'Новая категория')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Новая категория</h2>
        <div class="row justify-content-center">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="newsTitle">Название категории</label>
                    <input name="category" type="text" class="form-control" id="newsTitle"
                           value="{{ $category->category}}">
                </div>
                <div class="form-group">
                    <label for="newsTitle">Название латиницей</label>
                    <input name="name" type="text" class="form-control" id="newsTitle"
                           value="{{ $category->name}}">
                </div>

                <div class="form-group">
                    <button class="form-control" type="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
