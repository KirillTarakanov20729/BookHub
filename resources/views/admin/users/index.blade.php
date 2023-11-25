@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                @if($users->isEmpty())
                    <h2 class="mt-2">{{__('Нет пользователей')}}</h2>
                @else
                    <table class="table table-dark mt-3">
                        <thead>
                        <tr>
                            <th>{{ __('Email') }}</th>
                            <th>{{__('Имя')}}</th>
                            <th>{{__('Уровень подписки')}}</th>
                            <th>{{__('Активен')}}</th>
                            <th>{{ __('Действие') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->subLevel}}</td>
                                <td>{{$user->isActive}}</td>
                                @if($user->isActive == 1)
                                    <td>
                                        <a href="{{route('admin.users.block', $user)}}"
                                           style="text-decoration: none;">
                                            <button class="btn btn-danger">{{__('Заблокировать')}}</button>
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{route('admin.users.unblock', $user)}}"
                                           style="text-decoration: none;">
                                            <button class="btn btn-danger">{{__('Разблокировать')}}</button>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
