@extends('layouts.app')

@section('content')

    <x-container>
        <x-d-flex-center>
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">

               @yield('auth.content')

            </div>
        </x-d-flex-center>
    </x-container>
@endsection
