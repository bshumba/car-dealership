@props(['title' => '', 'bodyClass' => null, 'footerLinks' => ''])

<x-base-layout :$title :$bodyClass>
    {{-- @include('components.layouts.header') --}}
    <x-layouts.header />
    {{ $slot }}

</x-base-layout>
