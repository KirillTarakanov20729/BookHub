@extends('layouts.auth')

@section('auth.content')
    <x-card.card>
        <x-card.card-body>

            <div class="mb-md-0 mt-md-4 pb-3">

                <x-form.store-form action="{{route('reset-password.send_email')}}" method="POST">

                    <x-form.label>
                        Напишите ваш Email
                    </x-form.label>

                    <x-form.item>
                        <x-form.input type="email" name="email" placeholder="Email"/>
                    </x-form.item>


                    <x-form.button>
                        Отправить письмо
                    </x-form.button>

                    <x-form.error name="error"/>

                </x-form.store-form>

            </div>

        </x-card.card-body>
    </x-card.card>

@endsection
