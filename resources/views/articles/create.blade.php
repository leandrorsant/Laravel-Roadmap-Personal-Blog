

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Create Article') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Fill out this form to create a new article') }}
                    </p>
                </header>
            
                <form method="post" action="{{ route('articles.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
            
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1" autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
            
                        <x-input-label for="full_text" :value="__('Full text')" />
                        <textarea id="full_text" name="full_text" type="text-area" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" autocomplete="full_text"></textarea>
                        <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
                        
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" name="image" type="file" class="mt-1" autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        <br>
                        <x-primary-button class="mt-3 mb-3">{{ __('Save article') }}</x-primary-button>
                    </div>
                </form>
            </section>
            
        </div>
    </div>
</x-app-layout>