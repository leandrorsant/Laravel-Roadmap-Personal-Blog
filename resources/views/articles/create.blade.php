<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Article') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Fill out this form to create a new article') }}
        </p>
    </header>

    <form method="post" action="{{ route('articles.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('POST')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1" autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <x-input-label for="full_text" :value="__('Full text')" />
            <x-text-input id="full_text" name="full_text" type="text" class="mt-1" autocomplete="full_text" />
            <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
            
            <x-primary-button class="mb-3">{{ __('Save article') }}</x-primary-button>
        </div>
    </form>
</section>