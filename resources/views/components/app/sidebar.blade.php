<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased text-white transition-transform duration-200 -translate-x-full border-0 shadow-xl dark:shadow-none bg-stone-950 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0">
    <div class="h-[76px]">
        <x-icon name='menu' class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" />
        <a href="{{ route('dashboard') }}" class='block px-8 py-6 m-0 text-sm text-white whitespace-nowrap'>
            <x-dashboard-logo class="w-40 m-auto text-white" />
        </a>
    </div>
    <div class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
    </div>
    <div class="items-center block w-auto max-h-screen overflow-auto h-[calc(100vh-360px)] grow basis-full mt-5">
        {{-- <div class="mt-8 text-center">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                class="object-cover w-10 h-10 m-auto rounded-full lg:w-28 lg:h-28">
            @else
            <div class="flex items-center justify-center w-10 h-10 m-auto bg-gray-300 rounded-full lg:w-28 lg:h-28">
                <span class="text-sm text-stone-700 lg:text-4xl">
                    {{
                    collect(explode(' ', trim(Auth::user()->name)))
                    ->filter() // quitamos espacios vacíos
                    ->pipe(function ($parts) {
                    $first = strtoupper(mb_substr($parts->first(), 0, 1));
                    $last = $parts->count() > 1
                    ? strtoupper(mb_substr($parts->last(), 0, 1))
                    : '';
                    return $first . $last;
                    })
                    }}
                </span>
            </div>
            @endif

            <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">
                {{ Auth::user()->name }}
            </h5>
            <span class="hidden text-gray-400 lg:block">{{ Auth::user()->email }}</span>
        </div> --}}
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="group">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <x-icons.dashboard :active="request()->routeIs('dashboard')" />
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">
                        {{ __('Dashboard') }}
                    </span>
                </x-nav-link>
            </li>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages
                </h6>
            </li>
            <li class="mt-0.5 w-full">
                <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <x-icons.profile :active="request()->routeIs('profile.show')" />
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">
                        {{ __('Profile') }}
                    </span>
                </x-nav-link>
            </li>
        </ul>
    </div>

    {{-- <div class="flex flex-col px-6 py-4 -mx-6 space-y-2 border-t">
        <div class="flex flex-col space-y-2">
            <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                <x-icons.profile :active="request()->routeIs('profile.show')" />
                <span class="-mr-1 text-lg group-hover:text-gray-700">{{ __('Profile') }}</span>
            </x-nav-link>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <a href="{{ route('api-tokens.index') }}"
                class="flex items-center px-4 py-2 space-x-3 text-gray-600 rounded-md hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.1 0-2 .9-2 2m0 4c0 1.1.9 2 2 2m0-8c1.1 0 2 .9 2 2m0 4c0 1.1-.9 2-2 2m6-2c0 1.1-.9 2-2 2m0-8c1.1 0 2 .9 2 2M6 10c1.1 0 2-.9 2-2m0 8c0-1.1-.9-2-2-2" />
                </svg>
                <span>API Tokens</span>
            </a>
            @endif
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="flex flex-col space-y-1">
            <p class="px-4 py-2 text-xs font-semibold text-gray-400">
                {{ __('Manage Team') }}
            </p>

            <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                class="flex items-center px-4 py-2 space-x-3 text-gray-600 rounded-md hover:bg-gray-100">
                <span>{{ Auth::user()->currentTeam->name }} | {{ __('Settings') }}</span>
            </a>

            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
            <a href="{{ route('teams.create') }}"
                class="flex items-center w-full px-4 py-2 space-x-3 text-left text-gray-600 rounded-md hover:bg-gray-100">
                <span>{{ __('Create New Team') }}</span>
            </a>
            @endcan

            @if (Auth::user()->allTeams()->count() > 1)
            <div class="my-2 border-t border-gray-200"></div>
            @foreach (Auth::user()->allTeams() as $team)
            <x-switchable-team :team="$team" />
            @endforeach
            @endif
        </div>
        @endif

        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 space-x-3 text-left text-gray-600 rounded-md hover:bg-gray-100">
                <x-icon name="logout" class="w-4 h-4" />
                <span class="-mr-1 text-lg group-hover:text-gray-700">{{ __('Log Out') }}</span>
            </button>
        </form>
    </div> --}}
</aside>
