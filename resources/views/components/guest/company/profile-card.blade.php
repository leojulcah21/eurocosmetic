@php
    $user = Auth::user();

    $role = $user->role->name ?? 'Client';
    $colorByRole = match($role) {
        'Administrator' => 'blue',
        'Employee' => 'indigo',
        'Customer' => 'yellow',
        default => 'gray',
    };
@endphp


<div class="relative w-full mx-auto mt-6">
    <div
        class='relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 shadow-lg rounded-2xl bg-clip-border'>
        <div class="flex flex-wrap px-2 -mx-3">
            <div class="flex-none w-auto max-w-full px-3 pt-1">
                <div
                    class="relative inline-flex items-center justify-center w-[76px] h-[76px] text-base text-white transition-all duration-200 ease-in-out rounded-xl">
                    <img
                        src="{{ $user->profile_photo_path
                            ? $user->profile_photo_url
                            : asset('img/users/user.png') }}"
                        alt="{{ $user->name ?? 'profile image' }}"
                        class="object-cover w-full h-full shadow-2xl rounded-xl"
                    />
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="relative h-full">
                    <div class="flex items-center gap-1.5">
                        <h5 class="text-xl font-semibold tracking-wider text-stone-950">
                            {{ Auth::user()->name }}
                        </h5>
                        <x-badge class="px-3 py-0.5 mt-1" :color="$colorByRole" variant="soft">
                            {{ __($role) }}
                        </x-badge>
                    </div>

                    <p class="text-base font-medium leading-normal text-stone-950 ps-[1px]">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative right-0">
                    <ul id="profile-tabs"
                        class="relative flex flex-wrap py-1 pl-0.5 pr-[7px] list-none rounded-lg bg-[#f3f3f3] items-center">
                        <!-- Highlight dinámico -->
                        <li x-ref="movingTab"
                            class="absolute z-0 block w-0 transition-all duration-500 ease-in-out translate-x-0 bg-white rounded-lg shadow-sm pointer-events-none xl:h-7 lg:h-5 top-1 moving-tab">
                        </li>

                        <!-- Tabs -->
                        <li class="z-10 flex-auto text-center cursor-pointer">
                            <a href="#"
                                class="flex items-center justify-center w-full px-0 py-1 mb-0 text-sm rounded-lg tab-link text-stone-950"
                                data-tab="app">
                                <x-icon name="cards" class="w-5 h-5" />
                                <span class="ml-2">{{ __('Data') }}</span>
                            </a>
                        </li>
                        <li class="z-10 flex-auto text-center cursor-pointer">
                            <a href="#"
                                class="flex items-center justify-center w-full px-0 py-1 mb-0 text-sm rounded-lg tab-link text-stone-950"
                                data-tab="messages">
                                <x-icon name="devices" class="w-5 h-5" />
                                <span class="ml-2">{{ __('Sessions') }}</span>
                            </a>
                        </li>
                        <li class="z-10 flex-auto text-center cursor-pointer">
                            <a href="#"
                                class="flex items-center justify-center w-full px-0 py-1 mb-0 text-sm rounded-lg tab-link text-stone-950"
                                data-tab="settings">
                                <x-icon name="settings" class="w-5 h-5" />
                                <span class="ml-2">{{ __('Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab-content" class="w-full p-6 mx-auto">
    {{ $slot }}
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.tab-link');
        const panes = document.querySelectorAll('.tab-panel');
        const movingTab = document.querySelector('.moving-tab');

        if (!tabs.length || !movingTab) return;

        function setActiveTab(tab) {
            const target = tab.dataset.tab;
            const parentLi = tab.closest('li');

            // Ocultar todos los paneles
            panes.forEach(p => p.classList.add('hidden'));

            // Mostrar el panel activo
            const currentPane = document.getElementById(`tab-${target}`);
            if (currentPane) currentPane.classList.remove('hidden');

            // Mover el indicador flotante
            movingTab.style.width = `${parentLi.offsetWidth}px`;
            movingTab.style.transform = `translateX(${parentLi.offsetLeft}px)`;

            // Guardar el tab activo
            localStorage.setItem('activeProfileTab', target);
        }

        // --- Leer el tab activo previo ---
        const savedTab = localStorage.getItem('activeProfileTab');
        const defaultTab = savedTab
            ? [...tabs].find(t => t.dataset.tab === savedTab)
            : tabs[0];

        // Activar el guardado o el primero
        setTimeout(() => {
            if (defaultTab) setActiveTab(defaultTab);
        }, 10);


        // Asignar eventos de click
        tabs.forEach(tab => {
            tab.addEventListener('click', e => {
                e.preventDefault();
                setActiveTab(tab);
            });
        });

        // Ajustar al redimensionar
        window.addEventListener('resize', () => {
            const activeTabName = localStorage.getItem('activeProfileTab');
            const activeTab = [...tabs].find(t => t.dataset.tab === activeTabName);
            if (activeTab) setActiveTab(activeTab);
        });
    });
</script>
