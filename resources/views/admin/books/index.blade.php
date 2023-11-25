@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div>
                <a href="{{route('admin.books.create')}}">
                    <button class="btn btn-lg gradient-button w-25">
                        {{__('Создать')}}
                    </button>
                </a>
            </div>

        </div>
    </div>
@endsection
