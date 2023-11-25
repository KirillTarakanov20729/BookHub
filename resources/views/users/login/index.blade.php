@extends('layouts.app')

@section('title', 'Вход')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-4 col-md-9 col-12">
                <form action="{{route("check_login")}}" method="POST">
                    @csrf

                    <div class="mt-3">
                        <label for="email" class="fs-4">{{__("Email")}}</label>
                        <input id="email" name="email" type="email" class="form-control" value="{{request()->old('email')}}"/>
                    </div>

                    <div class="mt-3">
                        <label for="password" class="fs-4">{{__("Пароль")}}</label>
                        <input id="password" name="password" type="password" class="form-control"/>
                    </div>

                    @if($errors->any())
                        <span class="text-danger">Неверный email или пароль</span>
                    @endif

                    <div class="mt-2">
                        <a href="{{route('register')}}" class="fs-4 text-decoration-none text-white">{{__("Зарегистрироваться")}}</a>
                    </div>

                    <div class="mt-2" style="user-select: none;">
                        <input id="remember_token" name="remember_token" type="checkbox" class="form-check-input" />
                        <label for="remember" class="form-check-label">{{__("Запомнить меня")}}</label>
                    </div>


                    <div class="mt-2">
                        <button class="btn btn-lg btn-warning w-100 gradient-button" type="submit">{{__('Войти')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
