@extends('layouts.app')

@section('title', 'Редактирование категории')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Новая категория</h2>
        <div class="row justify-content-center">
            <form method="post"
                  action="{{ route('admin.categories.update', $category) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="newsTitle">Название категории</label>
                    <input name="category" type="text" class="form-control" id="newsTitle"
                           value="{{ $category->category }}">
                </div>
                <div class="form-group">
                    <label for="newsTitle">Название латиницей</label>
                    <input name="name" type="text" class="form-control" id="newsTitle"
                           value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <button class="form-control" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
