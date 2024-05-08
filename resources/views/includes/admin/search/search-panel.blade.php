<x-form.form action="{{route($index_route)}}" method="GET">

    <div class="d-flex justify-content-between align-items-center">

        <div class="d-flex col-10">

            <x-form.item class="me-2 col-3">
                <x-form.input name="name" placeholder="Поиск" value="{{request('name')}}"/>
            </x-form.item>

            @if(isset($selects))
                @foreach($selects as $select)
                    @include('includes.admin.search.select.search-select-' . $select)
                @endforeach
            @endif

        </div>

        <div class="d-flex">
            @if(isset($create_route))
                <x-form.item>
                    <x-card.a href="{{route($create_route)}}">
                        <x-card.button>
                            Создать
                        </x-card.button>
                    </x-card.a>
                </x-form.item>
            @endif

            <x-form.item>
                <x-card.button type="submit">
                    Поиск
                </x-card.button>
            </x-form.item>
        </div>

    </div>

</x-form.form>
