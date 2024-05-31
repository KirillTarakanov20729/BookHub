@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.publishers.store')}}" method="POST">

        <x-form.label>
            Создайте издателя
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name')}}"/>
        </x-form.item>

        <x-form.error name="error" />

        <x-form.item>
            <x-form.button>
                Создать
            </x-form.button>
        </x-form.item>


    </x-form.store-form>

@endsection
