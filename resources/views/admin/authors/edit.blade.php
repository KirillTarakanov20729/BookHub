@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.authors.update', ['id' => $author->id])}}" method="POST">
        @method('PUT')
        <x-form.label>
            Измените автора
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="first_name" placeholder="Имя" value="{{old('first_name', $author->first_name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="text" name="last_name" placeholder="Фамилия" value="{{old('last_name', $author->last_name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.input type="text" name="middle_name" placeholder="Отчество" value="{{old('middle_name', $author->middle_name)}}"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Изменить
            </x-form.button>
        </x-form.item>

        <x-form.input type="hidden" name="id" value="{{ $author->id }}"/>

    </x-form.store-form>

@endsection

