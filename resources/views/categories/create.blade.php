<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create Category') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Fill out this form to create a new category') }}
        </p>
    </header>

    <form method="post" action="{{ route('categories.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('POST')

        <div>
            <x-input-label for="name" :value="__('Category Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1" autocomplete="name" />
            <x-input-error :messages="$errors->updatePassword->get('name')" class="mt-2" />
            <x-primary-button class="mb-3">{{ __('Save category') }}</x-primary-button>
        </div>
    </form>
</section>