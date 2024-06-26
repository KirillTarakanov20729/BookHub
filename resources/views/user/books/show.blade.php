@extends('layouts.index-form')

@section('index')

    <div class="d-flex justify-content-center">


        <div class="d-flex flex-column align-items-start col-4 me-5">


            <img class="bd-placeholder-img card-img-top"
                 src="{{ asset("storage/$book->image_path") }}"
                 style="width: 100%; height: 100%; pointer-events: none;" alt="Обложка книги"/>

            @if($user->subscription->subscription_type_id < $book->subscription_type_id)
                <x-card.button class="mt-2" style="width: 100%;">
                    <x-card.a href="{{ route('user.subscriptions.index') }}">
                        ПОВЫСЬТЕ УРОВЕНЬ ПОДПИСКИ
                    </x-card.a>
                </x-card.button>
            @else
                <x-card.button class="mt-2" style="width: 100%;">
                    <x-card.a href=" {{ route('user.books.read', ['book' => $book->id]) }}">
                        ЧИТАТЬ
                    </x-card.a>
                </x-card.button>
            @endif

            @if(!$book->users->contains(auth()->user()))
                <x-form.store-form action="{{ route('user.books.was_read', ['book' => $book->id]) }}" method="POST">
                    <x-form.button class="mt-2" style="width: 100%;">
                        <x-card.a>
                            ОТМЕТИТЬ КАК ПРОЧИТАННУЮ
                        </x-card.a>
                    </x-form.button>
                </x-form.store-form>
            @else
                <x-form.store-form action="{{ route('user.books.was_read', ['book' => $book->id]) }}" method="POST"
                             class="w-100">
                    <x-form.button class="mt-2" style="width: 100%;">
                        <x-card.a>
                            КНИГА ПРОЧИТАНА
                        </x-card.a>
                    </x-form.button>
                </x-form.store-form>
            @endif
        </div>


        <div class="mb-2 col-8">
            <div class="">
                <h3 class="card-text">{{ $book->name }}</h3>
                <p class="card-text">{{ $book->full_description }}</p>
            </div>

            <div class="mt-2">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fs-4">
                        Авторы
                    </div>

                    <div class="fs-4">
                        @foreach($authors as $author)
                            {{ $author->full_name }}@if(!$loop->last),@endif
                        @endforeach
                    </div>
                </div>

                @include('includes.user.show-books.book-card.entity-block', ['title' => 'Жанры', 'entities' => $book->genres])

                @include('includes.user.show-books.book-card.entity-block', ['title' => 'Издательства', 'entities' => $book->publishers])

                @include('includes.user.show-books.book-card.info-block', ['title' => 'Возрастные ограничения', 'info' => $book->age_limit->age_limit. '+'])

                @include('includes.user.show-books.book-card.info-block', ['title' => 'Год написания', 'info' => $book->release_date])

            </div>
        </div>


    </div>

    <x-form.error name="error"/>

@endsection
