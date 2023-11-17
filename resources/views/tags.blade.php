<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                @include('tags.create')
            @endauth
            @forelse ($tags as $tag)
            @auth
            <x-dropdown class="z-40">
                <x-slot name="trigger">
                    <div class="bg-black flex justify-between">
                        <button class="absolute right-0 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('tags.edit', ['tag'=> $tag])">
                        Edit
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('tags.destroy', ['tag' => $tag])" >
                        <form method="post" action="{{ route('tags.destroy', ['tag' => $tag]) }}">
                            @csrf
                            @method('DELETE')
                            
                            <x-text-input id="name" name="name" type="hidden" value="{{ $tag->id ?? 'null' }}" class="mt-1 block w-full" autocomplete="name" />
                            <div class="flex items-end gap-4">
                                <button type = 'submit' class ='w-full text-left'>
                                    Delete
                                </button>
                            </div>
                        </form>

                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
                {{-- <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('tags.edit', ['tag'=> $tag]) }}">
                    Edit Tag
                </a> --}}
            @endauth
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                        <h1 class="text-center font-bold">{{ $tag->name }}</h1>
                    </div>
                </div>
                {{-- @auth
                    @include('tags.delete', ['tag'=> $tag])
                @endauth --}}
           @empty
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-left font-bold">No tags</h1>
                </div>
            </div>
           @endforelse
        </div>
    </div>
</x-app-layout>
