@extends('layouts.index-form')

@section('index')

    <x-form.form action="{{route('admin.users.index')}}" method="GET">

        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex col-10">

                <x-form.item class="me-2 col-3">
                    <x-form.input name="name" placeholder="Поиск" value="{{request('name')}}"/>

                </x-form.item>

                <x-form.item>
                    <x-form.select class="form-select form-select-lg" name="subscription_type_id">
                        <option value="">Любая</option>
                        @foreach($data->subscription_types as $subscription_type)
                            <option @if(request('subscription_type_id') == $subscription_type->id) selected @endif value="{{ $subscription_type->id }}">{{ $subscription_type->name }}</option>
                        @endforeach
                    </x-form.select>
                </x-form.item>

            </div>



            <div class="d-flex">

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
            @include('includes.admin.table.table-columns', ['columns' => ['ID', 'Имя', 'Email', 'Тип подписки']])
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>{{ $user->subscription->subscription_type->name }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

@endsection
