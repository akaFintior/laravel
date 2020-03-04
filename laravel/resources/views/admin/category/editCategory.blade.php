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
                <div class="card-img"
                     style="background-image: url({{ $category->image }})"></div>
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
                    @if ($errors->has('image'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('image') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <button class="form-control" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
