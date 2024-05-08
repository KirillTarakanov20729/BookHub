@props(['type'=> 'button'])
<button {{ $attributes->class(['btn', 'btn-lg', 'text-dark']) }} type="{{ $type }}">
    {{ $slot }}
</button>
