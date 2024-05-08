@extends('layouts.app')

@section('content')

    <x-container>
        <x-d-flex-center>

                <x-card.card>
                    <x-card.card-body class="text-dark">

                        @yield('index')

                    </x-card.card-body>
                </x-card.card>

        </x-d-flex-center>
    </x-container>
@endsection
