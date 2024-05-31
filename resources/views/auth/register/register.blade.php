@extends('layouts.auth')

@section('auth.content')
    <x-card.card>
        <x-card.card-body>

            <div class="mb-md-0 mt-md-0 pb-1">
                <x-form.store-form method="POST" action="#">

                    <x-form.label>
                        Регистрация
                    </x-form.label>

                    <x-form.item>
                        <x-form.input type="email" name="email" placeholder="Ваш email"/>
                    </x-form.item>

                    <x-form.item>
                        <x-form.input type="text" name="name" placeholder="Ваше имя"/>
                    </x-form.item>

                    <x-form.item>
                        <x-form.input type="password" name="password" placeholder="Ваш пароль"/>
                    </x-form.item>

                    <x-form.item>
                        <x-form.input type="password" name="password_confirmation" placeholder="Подтвердите пароль"/>
                    </x-form.item>

                    <div class="d-flex justify-content-center align-items-center">
                    <x-form.checkbox name="agreement">
                            Я согласен с
                        <x-form.a href="https://dogovor.ru/contracts/view/politika-konfidencialnosti?yclid=17978476476906340351">
                            политикой конфиденциальности
                        </x-form.a>
                    </x-form.checkbox>
                    </div>

                    <x-form.error name="error"/>

                    <x-form.button>
                        Зарегистрироваться
                    </x-form.button>


                </x-form.store-form>
            </div>

        </x-card.card-body>
    </x-card.card>
@endsection
