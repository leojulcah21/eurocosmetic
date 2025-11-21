@props(['class' => ''])
<div class="relative w-full mx-auto mt-3">
    <div
        class="relative flex flex-col flex-auto min-w-0 mx-6 break-words border-0 shadow-lg rounded-2xl {{ $class }}">
        {{ $slot }}
    </div>
</div>
