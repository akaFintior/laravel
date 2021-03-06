@extends('layouts.app')

@section('title', $news->title)

@section('menu')
    @include('menu.mainMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $news->title }}</div>
                    <div class="card-img" style="background-image: url({{ $news->image ?? asset('img/default.jpg') }})"></div>
                    <div class="card-body">
                        @if (!$news->is_private)
                            <p>{{ $news->inform }}</p>
                        @else
                            <br>Нет прав!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
