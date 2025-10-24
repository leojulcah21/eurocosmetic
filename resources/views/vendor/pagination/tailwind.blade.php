@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation"
        class="flex items-center justify-between px-4 py-3 bg-white border-t rounded-b-lg border-stone-200 dark:border-stone-700 dark:bg-stone-900 sm:px-6">

        {{-- Información de resultados --}}
        <div class="hidden w-full sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div class='mr-4'>
                <p class="text-sm text-stone-500 dark:text-stone-400">
                    Mostrando
                    <span class="font-semibold text-stone-900 dark:text-stone-100">{{ $paginator->firstItem() }}</span>
                    -
                    <span class="font-semibold text-stone-900 dark:text-stone-100">{{ $paginator->lastItem() }}</span>
                    de
                    <span class="font-semibold text-stone-900 dark:text-stone-100">{{ $paginator->total() }}</span>
                    registros
                </p>
            </div>

            {{-- Paginación --}}
            <div>
                <span class="relative z-0 inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                    {{-- Botón anterior --}}
                    @if ($paginator->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border cursor-default text-stone-400 border-stone-200 rounded-l-md dark:bg-stone-800 dark:border-stone-700 dark:text-stone-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border text-stone-600 border-stone-200 rounded-l-md hover:bg-stone-100 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-300 dark:hover:bg-stone-700"
                            aria-label="@lang('pagination.previous')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    @endif

                    {{-- Números --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-white border cursor-default text-stone-500 border-stone-200 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-400">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white border cursor-default bg-stone-700 border-stone-700">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-white border text-stone-600 border-stone-200 hover:bg-stone-100 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-300 dark:hover:bg-stone-700">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Botón siguiente --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border text-stone-600 border-stone-200 rounded-r-md hover:bg-stone-100 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-300 dark:hover:bg-stone-700"
                            aria-label="@lang('pagination.next')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span
                            class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border cursor-default text-stone-400 border-stone-200 rounded-r-md dark:bg-stone-800 dark:border-stone-700 dark:text-stone-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif

                </span>
            </div>
        </div>

        {{-- Versión móvil --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border rounded-md cursor-default text-stone-400 border-stone-200 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-500">
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border rounded-md text-stone-600 border-stone-200 hover:bg-stone-100 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-300 dark:hover:bg-stone-700">
                    Anterior
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border rounded-md text-stone-600 border-stone-200 hover:bg-stone-100 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-300 dark:hover:bg-stone-700">
                    Siguiente
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white border rounded-md cursor-default text-stone-400 border-stone-200 dark:bg-stone-800 dark:border-stone-700 dark:text-stone-500">
                    Siguiente
                </span>
            @endif
        </div>
    </nav>
@endif

