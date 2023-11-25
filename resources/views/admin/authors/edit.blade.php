@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-9 col-12">
                <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mt-3">
                        <label for="first_name" class="fs-4">{{__("Имя")}}</label>
                        <input id="first_name" name="first_name" type="text" class="form-control fs-5" value="{{$author->first_name}}"/>
                        @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="last_name" class="fs-4">{{__("Фамилия")}}</label>
                        <input id="last_name" name="last_name" type="text" class="form-control fs-5" value="{{$author->last_name}}"/>
                        @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button class="btn gradient-button w-100 fs-5" type="submit">
                            {{ __('Изменить') }}
                        </button>
                    </div>

                    <input type="hidden" id="id" name="id" value="{{$author->id}}"/>
                </form>
            </div>
        </div>
    </div>
@endsection
