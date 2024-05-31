<x-form.item class="me-2">
    <x-form.select class="form-select form-select-lg" name="age_limit_id">
        <option value="">Без ограничений</option>
        @foreach($data->age_limits as $age_limit)
            <option value="{{ $age_limit['id'] }}" @if(request()->get('age_limit_id') == $age_limit['id']) selected @endif>{{ $age_limit['age_limit'] }}+</option>
        @endforeach
    </x-form.select>
</x-form.item>
