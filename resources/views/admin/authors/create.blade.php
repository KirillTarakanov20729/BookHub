@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.authors.store')}}" method="POST">

        <x-form.label>
            Создайте автора
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="last_name" placeholder="Фамилия" value="{{old('last_name')}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="text" name="first_name" placeholder="Имя" value="{{old('first_name')}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="text" name="middle_name" placeholder="Отчество" value="{{old('middle_name')}}"/>
        </x-form.item>

        <x-form.error name="error" />

        <x-form.item>
            <x-form.button>
                Создать
            </x-form.button>
        </x-form.item>


    </x-form.store-form>

@endsection
