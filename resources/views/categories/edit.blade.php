<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Edit Category') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Fill out this form to edit a category') }}
                      
                    </p>
                </header>
            
                <form method="POST" action="{{ route('categories.update', ['category' =>$category]) }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
            
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 w-full" autocomplete="name" value="{{ $category->name }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <br>
                        <x-primary-button class="mt-3 mb-3">{{ __('Save category') }}</x-primary-button>
                    </div>
                </form>
            </section>
            
        </div>
    </div>
</x-app-layout>




<a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('categories.create', ['category'=> $category]) }}">
    Edit Category {{ $category->name }}
</a>