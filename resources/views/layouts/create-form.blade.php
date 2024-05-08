@extends('layouts.app')

@section('content')

    <x-container>
        <x-d-flex-center>

            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <x-card.card>
                    <x-card.card-body>

                        @yield('form')

                    </x-card.card-body>
                </x-card.card>
            </div>
        </x-d-flex-center>
    </x-container>
@endsection
