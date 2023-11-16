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
                        @include('categories.edit', ['category' => $category])
                    @endauth

                
                        
                        
                        <h1 onClick="hello" class="text-center font-bold">{{ $category->name }}</h1>
                    
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
