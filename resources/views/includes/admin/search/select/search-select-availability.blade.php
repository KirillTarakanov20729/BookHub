<x-form.item class="me-2">
    <x-form.select class="form-select form-select-lg" name="availability">
        <option @if(request('availability') == null) selected @endif value="">Все книги</option>
        <option @if(request('availability') == 1) selected @endif value="1">Доступные мне</option>
    </x-form.select>
</x-form.item>
