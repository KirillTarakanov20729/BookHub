@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div>
                    <a href="{{route('admin.genres.create')}}">
                        <button class="btn btn-danger w-25">
                            {{__('Создать')}}
                        </button>
                    </a>
                </div>
                @if($genres->isEmpty())
                    <h2 class="mt-2">{{__('Нет жанров')}}</h2>
                @else
                    <table class="table table-dark mt-3">
                        <thead>
                        <tr>
                            <th>{{ __('Название') }}</th>
                            <th>{{ __('Действия') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $genre->name }}</td>
                                <td>
                                    <a href="{{route('admin.genres.edit', $genre->id)}}"
                                       style="text-decoration: none;">
                                        <button class="btn btn-danger">{{__('Изменить')}}</button>
                                    </a>
                                    <form action="{{ route('admin.genres.delete', $genre->id) }}" method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Удалить') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
