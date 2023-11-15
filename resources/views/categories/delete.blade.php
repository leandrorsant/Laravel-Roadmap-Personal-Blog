@auth
    <form method="post" action="{{ route('categories.destroy', ['category' => $category]) }}">
        @csrf
        @method('DELETE')
        
        <x-text-input id="name" name="name" type="hidden" value="{{ $category->id ?? 'null' }}" class="mt-1 block w-full" autocomplete="name" />
        <div class="flex items-end gap-4">
            <x-primary-button>{{ __('Delete category') }}</x-primary-button>
        </div>
    </form>
@endauth