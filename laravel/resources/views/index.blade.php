@extends('layouts.app')

@section('title', 'Главная')

@section('menu')
    @include('menu.mainMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Добро пожаловать!</h1>
            </div>
            <div class="col-md-12">
                <p>{{ $message }}</p>
            </div>
        </div>
    </div>
@endsection
