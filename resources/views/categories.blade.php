<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div x-data="{ open: false }" class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                <div class="flex justify-end items-end">
                    <div class="w-fit ml-0">
                        <template x-if="open">    
                            <div>
                                <button x-on:click="open = ! open" class="float-right mt-2 text-white bg-gray-500 w-10 hover:bg-red-500 rounded-md">X</button>
                                @include('categories.create')
                            </div>
                        </template>   
                        
                        <button x-bind:class="open ? 'hidden' : ''" x-on:click="open = ! open" class = ' mb-2 px-4 py-2 bg-green-800 dark:bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-500 focus:bg-green-700 dark:focus:bg-green-800 active:bg-green-900 dark:active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 '>
                            Create category
                        </button>
                    </div>
                </div>
            @endauth
           @forelse ($categories as $category)
                <div x-data="{edit : false}">
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
                                {{-- <x-dropdown-link :href="route('categories.edit', ['category'=> $category])"> --}}
                                <x-dropdown-link x-on:click="edit = !edit">
                                    Edit
                                </x-dropdown-link>
                                <x-dropdown-link>
                                    <form method="post" action="{{ route('categories.destroy', ['category' => $category]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="flex items-end gap-4">
                                            <button type = 'submit' class ='w-full h-full text-left'>
                                                Delete
                                            </button>
                                        </div>
                                    </form>

                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                        @endauth
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-2">
                        <div class="p-6 text-gray-900 dark:text-gray-100">

                
                        <template x-if='!edit'>
                            <h1 class="text-center font-bold">{{ $category->name }}</h1>
                        </template>
                        <template x-if='edit'>
                            <div>
                                <button x-on:click="edit = ! edit" class="float-right text-white bg-gray-500 w-10 hover:bg-red-500 rounded-md">X</button>
                                <form method="POST" action="{{ route('categories.update', ['category' =>$category]) }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')
                            
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" name="name" type="text" class="mt-1 w-full" autocomplete="name" value="{{ $category->name }}" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        <br>
                                        <x-primary-button class="mt-3 mb-3">{{ __('Edit category') }}</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </template>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h1 class="text-left font-bold">No categories</h1>
                            </div>
                        </div>
                    @endforelse
                    {{ $categories->links() }}
                </div>
        </div>
    </div>
</x-app-layout>
