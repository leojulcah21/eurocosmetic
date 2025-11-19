@props(['class' => '', 'title' => '', 'description' => ''])
<div class="relative w-full mx-auto mt-6">
    <div
        class='relative flex flex-col flex-auto min-w-0 mx-6 overflow-hidden break-words bg-white border-0 shadow-lg rounded-2xl bg-clip-border {{ $class }}'>
        <div class='px-4 py-5 mx-auto max-w-screen-2xl'>
            <div class="max-w-screen-sm mx-auto mb-8 text-center">
                <h1 class="mb-4 text-xl font-extrabold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                    {{ $title }}
                </h1>
                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                    {{ $description }}
                </p>
            </div>
            <div class='grid grid-cols-1 gap-4 md:gap-3 xl:grid-cols-2'>
                {{ $slot }}
            </div>
        </div>
    </div>

</div>
