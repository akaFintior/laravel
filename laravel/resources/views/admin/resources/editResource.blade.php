@extends('layouts.app')

@section('title', 'Редактирование ресурса')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Новая категория</h2>
        <div class="row justify-content-center">
            <form method="post"
                  action="{{ route('resource.update', $resource) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-img"
                     style="background-image: url({{ $category->image }})"></div>
                <div class="form-group">
                    <label for="newsTitle">Название категории</label>
                    <input name="title" type="text" class="form-control" id="newsTitle"
                           value="{{ $resource->title }}">
                </div>
                <div class="form-group">
                    <label for="newsTitle">Название латиницей</label>
                    <input name="link" type="text" class="form-control" id="newsTitle"
                           value="{{ $resource->link }}">
                </div>
                <div class="form-group">
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <button class="form-control" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
