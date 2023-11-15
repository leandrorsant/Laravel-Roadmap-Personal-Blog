<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Tag') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Fill out this form to create a new tag') }}
        </p>
    </header>

    <form method="post" action="{{ route('tags.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('POST')

        <div>
            <x-input-label for="name" :value="__('Tag Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1" autocomplete="name" />
            <x-primary-button class="mb-3">{{ __('Save tag') }}</x-primary-button>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    </form>
</section>