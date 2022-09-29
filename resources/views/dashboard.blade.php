<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py- m-6">
         <div class="w-full m-2">
             @can('write post')
                <a href="{{ route('posts.create') }}" class="m-2 p-2 bg-green-400 rounded">
                    Create Post
                </a>
               @endcan
            </div>

    </div>
</x-app-layout>
