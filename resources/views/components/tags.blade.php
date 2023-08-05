@props(['tags'])

@php
    $tags = explode(',', $tags);
@endphp

<ul {{ $attributes->merge(['class' => 'flex']) }}>
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-rose-500 text-white font-medium rounded py-1 px-3 mr-2">
            <a href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
