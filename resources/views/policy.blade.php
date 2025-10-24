<x-blog-layout>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row">
        <div
            class="text-sm leading-[20px] flex-1 p-6 pb-12 lg:p-14 bg-white shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-lg">
            <h1 class="mb-2 text-lg font-bold"> Privacy Policy </h1>
            {!! $policy !!}
        </div>
        <div
            class="bg-[#fff2f2] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
            <x-application-logo class="m-auto mt-10 h-72 w-72 text-stone-950" />
        </div>
    </main>
</x-blog-layout>
