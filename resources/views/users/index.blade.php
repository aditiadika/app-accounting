<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex justify-end mb-4">
            <a href="{{ route('users.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                New User
            </a>
        </div>

        <livewire:user-table />
    </div>
</x-app-layout>
