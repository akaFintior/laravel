@extends('layouts.app')

@section('title', 'Форма связи')

@section('menu')
    @include('menu.mainMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('contact') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Ваш номер телефона</label>
                        <input name="phone" type="number" class="form-control" id="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Ваша электронная почта</label>
                        <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="info">Оставьте комментарий или отзыв</label>
                        <textarea name="text" class="form-control" rows="5" id="info">{{ old('text') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" value="Отправить отзыв" id="addNews">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
