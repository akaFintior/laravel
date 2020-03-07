@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.adminMenu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <h2>Назначение прав админа пользователям</h2>
                <table>
                    @foreach($users as $user)
                        @if($user->id === 1 || $user->id === Auth::user()->id) @continue(next($user)) @endif
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.adminConf', $user) }}" method="post">
                                    @csrf
                                    @if(!$user->is_admin)
                                        <button type="submit">Назначить права админа</button>
                                    @else
                                        <button type="submit">Убрать права админа</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
