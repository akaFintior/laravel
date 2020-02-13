@section('menu')
    <nav class="navbar navbar-dark bg-dark">
        <a href="{{ route('home') }}">Главная</a>
        <a href="{{ route('news') }}">Новости</a>
        <a href="{{ route('admin') }}">Админка</a><br>
    </nav>
@endsection
