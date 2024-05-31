@extends('layouts.index-form')

@section('index')

    <x-form.form action="{{route('admin.publishers.index')}}" method="GET">

        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex col-10">

                <x-form.item class="me-2 col-3">
                    <x-form.input name="name" placeholder="Поиск" value="{{request('name')}}"/>
                </x-form.item>

            </div>

            <div class="d-flex">

                <x-form.item>
                    <x-card.a href="{{route('admin.publishers.create')}}">
                        <x-card.button>
                            Создать
                        </x-card.button>
                    </x-card.a>
                </x-form.item>

                <x-form.item>
                    <x-card.button type="submit">
                        Поиск
                    </x-card.button>
                </x-form.item>
            </div>

        </div>

    </x-form.form>

    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            @include('includes.admin.table.table-columns', ['columns' => ['ID', 'Название', 'Действие']])
        </tr>
        </thead>

        <tbody>
        @foreach($publishers as $publisher)
            <tr>
                <th>{{ $publisher->id }}</th>

                <td>{{ $publisher->name }}</td>

                <td class="col-3">
                    <div class="d-flex justify-content-center">

                        <x-form.button class="btn-sm me-2">
                            <x-card.a href="{{route('admin.publishers.edit', ['id' => $publisher->id])}}">
                                Изменить
                            </x-card.a>
                        </x-form.button>


                        <x-form.store-form action="{{route('admin.publishers.delete', ['id' => $publisher->id])}}" method="POST">
                            @method('DELETE')

                            <x-form.button class="btn-sm">
                                УДАЛИТЬ
                            </x-form.button>
                        </x-form.store-form>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $publishers->links() }}

@endsection
