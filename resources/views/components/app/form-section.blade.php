@props(['class' => '', 'title' => ''])
<div class="relative w-full mx-auto mt-6">
    <div
        class='relative flex flex-col flex-auto min-w-0 mx-6 overflow-hidden break-words bg-white border-0 shadow-lg rounded-2xl bg-clip-border {{ $class }}'>
        <h1 class="mb-4 text-xl font-bold text-stone-900 dark:text-white">{{ $title }}</h1>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
