@extends('layouts.app')

@section('title', 'Регистрация')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-9 col-12">
                <form action="{{route("check_register")}}" method="POST">
                    @csrf

                    <div class="mt-3">
                        <label for="name" class="fs-4">{{__("Ваше имя")}}</label>
                        <input id="name" name="name" type="text" class="form-control fs-5" value="{{request()->old('name')}}"/>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="email" class="fs-4">{{__("Email")}}</label>
                        <input id="email" name="email" type="email" class="form-control fs-5" value="{{request()->old('email')}}"/>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="password" class="fs-4">{{__("Пароль")}}</label>
                        <input id="password" name="password" type="password" class="form-control fs-5"/>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="password_confirmation" class="fs-4">{{__("Подтверждение пароля")}}</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control fs-5"/>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-lg btn-warning w-100 gradient-button" type="submit">{{__('Зарегистрироваться')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
