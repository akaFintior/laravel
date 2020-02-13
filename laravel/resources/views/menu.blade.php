@section('menu')
    <nav class="navbar navbar-dark bg-dark">
        <a href="{{ route('index') }}">Главная</a>
        <a href="{{ route('news.all') }}">Новости</a>
        <a href="{{ route('news.categories') }}">Категории</a>
        <a href="{{ route('admin') }}">Админка</a>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
@endsection
