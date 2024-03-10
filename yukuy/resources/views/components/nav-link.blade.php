@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center ml-4 px-1 pt-1 text-3xl font-medium leading-5 text-rose-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
    : 'block rounded-lg hover:bg-rose-100 px-4 py-2 text-sm font-medium text-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
