@extends('layouts.app')

@section('title', 'Новая категория')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <h2 class="row justify-content-center">Новая категория</h2>
        <div class="row justify-content-center">
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="newsTitle">Название категории</label>
                    @if ($errors->has('category'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('category') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input name="category" type="text" class="form-control" id="newsTitle"
                           value="{{ $category->category}}">
                </div>
                <div class="form-group">
                    <label for="newsTitle">Название латиницей</label>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('name') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <input name="name" type="text" class="form-control" id="newsTitle"
                           value="{{ $category->name}}">
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
                    <button class="form-control" type="submit">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
