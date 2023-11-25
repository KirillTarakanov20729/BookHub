@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-9 col-12">
                <form action="{{ route('admin.genres.store') }}" method="POST">
                    @csrf

                    <div class="mt-3">
                        <label for="name" class="fs-4">{{__("Название")}}</label>
                        <input id="name" name="name" type="text" class="form-control fs-5" value="{{request()->old('name')}}"/>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn gradient-button w-100 fs-5" type="submit">
                            {{ __('Создать') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
