@extends('layouts.app')

@section('title', 'Новый ресурс')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Новый ресурс</h2>
        <div class="row justify-content-center">
            <form action="{{ route('resources.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="resourceTitle">Название ресурса</label>
                    <input name="title" type="text" class="form-control" id="resourceTitle"
                           value="{{ $resource->title }}">
                </div>
                <div class="form-group">
                    <label for="resourceLink">Ссылка на ресурс</label>
                    <input name="link" type="text" class="form-control" id="resourceLink"
                           value="{{ $resource->link }}">
                </div>
                <div class="form-group">
                    <button class="form-control" type="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
