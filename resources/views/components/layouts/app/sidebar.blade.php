<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('admin.projects.index') }}" class="me-5 flex items-center justify-center"
            wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            {{-- Platform --}}
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('admin.projects.index')"
                    :current="request()->routeIs('admin.projects.*')" wire:navigate>
                    {{ __('Projects') }}
                </flux:navlist.item>

                {{-- Coming Soon --}}
                <flux:navlist.item icon="briefcase" :href="route('admin.business-fields.index')"
                    :current="request()->routeIs('admin.business-fields.*')" wire:navigate>
                    {{ __('Business Fields') }}
                </flux:navlist.item>

                <flux:navlist.item icon="tag" :href="route('admin.tags.index')"
                    :current="request()->routeIs('admin.tags.*')" wire:navigate>
                    {{ __('Tags') }}
                </flux:navlist.item>

                <flux:navlist.item icon="building-office-2" :href="route('admin.clients.index')"
                    :current="request()->routeIs('admin.clients.*')" wire:navigate>
                    {{ __('Clients') }}
                </flux:navlist.item>
            </flux:navlist.group>

            {{-- Company (Coming Soon) --}}
            <flux:navlist.group :heading="__('Company')" class="grid">
                <flux:navlist.item :href="route('admin.company.edit')"
                    :current="request()->routeIs('admin.company.*')" wire:navigate>
                    {{ __('Company Info') }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('admin.company.legal.edit')"
                    :current="request()->routeIs('admin.company.legal.*')" wire:navigate>
                    {{ __('Legal Data') }}
                </flux:navlist.item>
            </flux:navlist.group>

            {{-- Messages --}}
            <flux:navlist.group :heading="__('Communication')" class="grid">
                <flux:navlist.item icon="envelope" :href="route('admin.messages.index')"
                    :current="request()->routeIs('admin.messages.*')" wire:navigate>
                    {{ __('Messages') }}
                    @if ($unreadCount = \App\Models\ContactMessage::where('is_read', false)->count())
                        <flux:badge size="sm" color="red">{{ $unreadCount }}</flux:badge>
                    @endif
                </flux:navlist.item>
            </flux:navlist.group>

            {{-- Users (Coming Soon) --}}
            {{-- <flux:navlist.group :heading="__('System')" class="grid">
        <flux:navlist.item 
            icon="users" 
            :href="route('admin.users.index')"
            :current="request()->routeIs('admin.users.*')" 
            wire:navigate>
            {{ __('Users') }}
        </flux:navlist.item>
    </flux:navlist.group> --}}
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="arrow-left" :href="route('home')" target="_blank">
                {{ __('View Website') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    <x-dialog />
    <x-toast />
    @fluxScripts
</body>

</html>
