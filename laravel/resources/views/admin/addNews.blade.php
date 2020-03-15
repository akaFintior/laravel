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
                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('title') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input name="title" type="text" class="form-control" id="newsTitle"
                               value="{{ $news->title ?? old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <select name="category_id" class="form-control" id="newsCategory">
                            @forelse($categories as $item)
                                <option @if ($item->id == (old('category_id') ?? $news->category_id)) selected
                                        @endif value="{{ $item->id }}">{{ $item->category }}</option>
                            @empty
                                <h2>Нет категории</h2>
                            @endforelse
                                <option value="55">не верная категория</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        @if ($errors->has('inform'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('inform') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <textarea name="inform" class="form-control" rows="5"
                                  id="textEdit">{!! old('inform') ?? $news->inform ?? "" !!}</textarea>
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
                        <button class="form-control" type="submit">
                            @if ($news->id) Изменить @else Добавить @endif
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('textEdit', options);
    </script>
@endsection
