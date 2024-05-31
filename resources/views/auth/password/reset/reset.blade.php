@extends('layouts.auth')

@section('auth.content')
    <x-card.card>
        <x-card.card-body>

            <div class="mb-md-0 mt-md-4 pb-3">

                <x-form.store-form action="{{route('reset-password.reset', ['reset_password_request' => $reset_password_request->token])}}" method="POST">

                    <x-form.label>
                        Напишите новый пароль
                    </x-form.label>

                    <x-form.item>
                        <x-form.input type="password" name="new_password" placeholder="Новый пароль"/>
                    </x-form.item>


                    <x-form.error name="error"/>
                    <x-form.button>
                        Сохранить
                    </x-form.button>

                    <x-form.error name="error"/>

                </x-form.store-form>

            </div>

        </x-card.card-body>
    </x-card.card>

@endsection
