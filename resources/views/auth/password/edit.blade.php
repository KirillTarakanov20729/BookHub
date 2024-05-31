@extends('layouts.auth')

@section('auth.content')
    <x-card.card>
        <x-card.card-body>

            <div class="mb-md-0 mt-md-4 pb-3">

                <x-form.store-form action="{{route('password.update')}}" method="POST">

                    <x-form.label>
                        Измените пароль
                    </x-form.label>

                    <x-form.item>
                        <x-form.input type="password" name="current_password" placeholder="Текущий пароль"/>
                    </x-form.item>

                    <x-form.item>
                        <x-form.input type="password" name="new_password" placeholder="Новый пароль"/>
                    </x-form.item>


                    <x-form.error name="error"/>
                    <x-form.button>
                        Изменить
                    </x-form.button>

                    <x-form.error name="error"/>

                    <input type="hidden" name="id" value="{{ $user->id }}">
                </x-form.store-form>

            </div>

        </x-card.card-body>
    </x-card.card>

@endsection
