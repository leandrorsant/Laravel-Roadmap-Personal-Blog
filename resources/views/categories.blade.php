<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                @include('categories.create')
            @endauth
           @forelse ($categories as $category)
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
                            <x-dropdown-link :href="route('categories.edit', ['category'=> $category])">
                                Edit
                            </x-dropdown-link>
                            <x-dropdown-link>
                                <form method="post" action="{{ route('categories.destroy', ['category' => $category]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex items-end gap-4">
                                        <button type = 'submit' class ='w-full text-left'>
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

               
                    
                    <h1 class="text-center font-bold">{{ $category->name }}</h1>
                    
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
</x-app-layout>
