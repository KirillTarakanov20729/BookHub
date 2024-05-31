@extends('layouts.auth')

@section('auth.content')
    <x-card.card>
        <x-card.card-body>

            <div class="mb-md-5 mt-md-4 pb-5">

                <x-form.store-form action="{{route('login_check')}}" method="POST">

                    <x-form.label>
                        Вход
                    </x-form.label>

                    <x-form.item>
                        <x-form.input type="email" name="email" placeholder="Email"/>
                    </x-form.item>

                    <x-form.item>
                        <x-form.input type="password" name="password" placeholder="Пароль"/>
                    </x-form.item>


                    <div class="d-flex justify-content-center align-items-center">
                        <x-form.checkbox name="remember" value="1">
                            Запомнить меня
                        </x-form.checkbox>
                    </div>

                    <x-form.p>
                        <x-form.a href="{{ route('reset-password.email') }}">
                            Забыли пароль?
                        </x-form.a>
                    </x-form.p>

                    <x-form.error name="error"/>
                    <x-form.button>
                        Войти
                    </x-form.button>

                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                        <x-form.a href="#!"><i class="fab fa-facebook-f fa-lg"></i></x-form.a>
                        <x-form.a href="#!"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></x-form.a>
                        <x-form.a href="#!"><i class="fab fa-google fa-lg"></i></x-form.a>
                    </div>

                </x-form.store-form>

            </div>

            <div>
                <x-form.p>Нет аккаунта?
                    <x-form.a href="{{route('register')}}">
                        Регистрация
                    </x-form.a>
                </x-form.p>
            </div>

        </x-card.card-body>
    </x-card.card>

@endsection
