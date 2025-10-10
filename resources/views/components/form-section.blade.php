@props(['submit'])

<div {{ $attributes->merge(['class' => 'relative']) }}>
    <form wire:submit="{{ $submit }}">
        <div class="p-6 pb-0 border-b-0 border-solid border-[rgb(0_0_0/0.125)] rounded-t-2xl">
            <div class="flex items-center justify-between">
                <p class="mb-0 dark:text-white/80">{{ __('Edit Profile') }}</p>
                @if (isset($actions))
                <div class='flex items-center ms-auto'>
                    {{ $actions }}
                </div>
                @endif
            </div>
        </div>
        <div class='flex-auto p-6'>
            <p class="text-sm leading-normal uppercase dark:text-white dark:opacity-60">{{ __('Profile Information') }}
            </p>
            <div class="flex flex-wrap {{ isset($actions) ? '' : '-mx-3' }}">
                {{ $form }}
            </div>
        </div>
    </form>
</div>
