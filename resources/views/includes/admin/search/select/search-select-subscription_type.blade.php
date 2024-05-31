<x-form.item>
    <x-form.select class="form-select form-select-lg" name="subscription_type_id">
        <option value="">Любая</option>
        @foreach($data->subscription_types as $subscription_type)
            <option @if(request('subscription_type_id') == $subscription_type['id']) selected @endif value="{{ $subscription_type['id'] }}">{{ $subscription_type['name'] }}</option>
        @endforeach
    </x-form.select>
</x-form.item>
