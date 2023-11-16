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
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    @auth
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('categories.edit', ['category'=> $category]) }}">
                            Edit Category
                        </a>
                    @endauth
                    
                    <h1 class="text-center font-bold">{{ $category->name }}</h1>
                    
                    </div>
                </div>
                
                @auth
                    @include('categories.delete', ['category'=> $category])
                @endauth
           @empty
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-left font-bold">No categories</h1>
                </div>
            </div>
           @endforelse
        </div>
    </div>
</x-app-layout>
