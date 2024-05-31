@extends('layouts.create-form')

@section('form')

    <x-form.store-form action="{{route('admin.' . $entity . '.store')}}" method="POST">

        <x-form.label>
            Напишите имя {{$entity_name}}
        </x-form.label>

        <x-form.item>
            <x-form.input type="text" name="name" placeholder="Имя"/>
        </x-form.item>

        <x-form.item>
            <x-form.button>
                Создать
            </x-form.button>
        </x-form.item>

    </x-form.store-form>

@endsection
