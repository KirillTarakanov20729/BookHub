

<x-form.button class="btn-sm me-2">
    <x-card.a href="{{route($edit_route, ['id' => $entity->id])}}">
        Изменить
    </x-card.a>
</x-form.button>

<x-form.form action="{{route($delete_route, ['id' => $entity->id])}}" method="POST">
    @method('DELETE')

    <x-form.button class="btn-sm">
        УДАЛИТЬ
    </x-form.button>
</x-form.form>
