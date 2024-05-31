@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.features.update', ['id' => $feature->id])}}" method="POST">
        @method('PUT')
        <x-form.label>
            Измените особенность
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Название" value="{{old('name', $feature->name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <x-form.input type="hidden" name="id" value="{{ $feature->id }}"/>

    </x-form.store-form>

@endsection

