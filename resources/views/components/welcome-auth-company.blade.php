@props(['class' => ''])

<main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row {{ $class }}">
    <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] rounded-bl-lg rounded-tl-lg">
        <h1 class="mb-1 text-sm font-medium text-stone-950"> {{ __('Welcome to') }} </h1>
        <p class="mb-2 text-sm font-bold uppercase text-stone-700 font-raleway">Eurocosmetic</p>
        <ul class="flex flex-col mb-4 lg:mb-6">
            <li  class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute text-sm">
                <span class="relative py-1 bg-white">
                    <span
                        class="flex items-center justify-center rounded-full bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border border-[#e3e3e0]">
                        <span class="rounded-full bg-[#dbdbd7] w-1.5 h-1.5"></span>
                    </span>
                </span>
                <span class='text-stone-950'>
                    @role('Administrator', 'Employee')
                        @php($user = Auth::user())
                        {{ $user->name }}
                    @endrole
                </span>
            </li>
            <li  class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                <span class="relative py-1 bg-white">
                    <span
                        class="flex items-center justify-center rounded-full bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border border-[#e3e3e0]">
                        <span class="rounded-full bg-[#dbdbd7] w-1.5 h-1.5"></span>
                    </span>
                </span>
                <span class='text-stone-950'>
                    @role('Administrator', 'Employee')
                        {{ __('You can access your') }}
                        <a href="{{ route('company.login') }}" target="_blank"
                            class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] ml-1">
                            <span> {{ __('Profile Information') }} </span>
                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                                <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor"
                                    stroke-linecap="square" />
                            </svg>
                        </a>
                    @endrole
                </span>
            </li>
        </ul>
        <ul class="flex gap-3 text-sm leading-normal">
            <li>
                <a href="{{ route('home') }}" target="_blank"
                    class="inline-block hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-lg border border-black text-white text-[13px] leading-normal">
                    Volver a la tienda
                </a>
            </li>
        </ul>
    </div>
    <div class="bg-red-100 relative lg:-ml-px -mb-px lg:mb-0 rounded-tr-lg rounded-br-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
        <x-application-logo class="m-auto mt-10 h-72 w-72 text-stone-950" />
    </div>
</main>
