@extends('layouts.main')
@extends('menu.mainMenu')
@extends('layouts.header')
@extends('layouts.footer')

@section('title')
    Добавления Новости
@endsection

@section('content')
    <main>
        <form>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                       checked>
                <label class="form-check-label" for="exampleRadios1">
                    Спорт
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Политика
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Музыка
                </label>
            </div>
            <input class="form-control" type="text" placeholder="Название новости" required>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                          placeholder="Текст новости" required></textarea>
            </div>
            <input type="submit" value="Добавить новость">
        </form>
    </main>
@endsection
