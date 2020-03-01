@extends('layouts.app
')
@section('title', 'Добавления Новости')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST"
                      action="@if (!$news->id){{ route('admin.addNews') }} @else {{ route('admin.saveNews', $news) }}@endif"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="newsTitle">Название новости</label>
                        <input name="title" type="text" class="form-control" id="newsTitle"
                               value="{{ $news->title ?? old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        <select name="category_id" class="form-control" id="newsCategory">
                            @forelse($categories as $item)
                                <option @if ($item->id == old('category')) selected
                                        @endif value="{{ $item->id }}">{{ $item->category }}</option>
                            @empty
                                <h2>Нет категории</h2>
                            @endforelse
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        <textarea name="inform" class="form-control" rows="5"
                                  id="newsText">{{ $news->inform ?? old('inform') }}</textarea>
                    </div>

                    <div class="form-check">
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif name="isPrivate"
                               class="form-check-input"
                               type="checkbox" value="1" id="newsPrivate">
                        <label class="form-check-label" for="newsPrivate">
                            Новость приватная?
                        </label>
                    </div>

                    <div class="form-group">
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <button class="form-control" type="submit">
                            @if ($news->id) Изменить @else Добавить @endif
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
