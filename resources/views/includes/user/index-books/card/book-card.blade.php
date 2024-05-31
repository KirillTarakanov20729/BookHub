<x-card.item class="col-3">
    @if(\Illuminate\Support\Facades\Auth::user()->books->contains($book))
    <div class="card shadow-sm opacity-50">
        <img class="bd-placeholder-img card-img-top h-75"
             src="{{ asset("storage/$book->image_path") }}"
             style="width: 100%; pointer-events: none;" alt="Обложка книги">

        <div class="card-body h-25">
            <h3 class="card-text">{{ $book->name }}</h3>
            <p class="card-text">{{ $book->short_description }}</p>
        </div>


        <div class="d-flex justify-content-center align-items-center mb-4">
            <x-card.a href="{{ route('user.books.show', ['book' => $book->id]) }}">
                <x-card.button>
                    Открыть
                </x-card.button>
            </x-card.a>
        </div>
    </div>
    @else
        <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top h-75"
                 src="{{ asset("storage/$book->image_path") }}"
                 style="width: 100%; pointer-events: none;" alt="Обложка книги">

            <div class="card-body h-25">
                <h3 class="card-text">{{ $book->name }}</h3>
                <p class="card-text">{{ $book->short_description }}</p>
            </div>


            <div class="d-flex justify-content-center align-items-center mb-4">
                <x-card.a href="{{ route('user.books.show', ['book' => $book->id]) }}">
                    <x-card.button>
                        Открыть
                    </x-card.button>
                </x-card.a>
            </div>
        </div>
    @endif

</x-card.item>
