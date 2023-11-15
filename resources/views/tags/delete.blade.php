@auth
    <form method="post" action="{{ route('tags.destroy', ['tag' => $tag]) }}">
        @csrf
        @method('DELETE')
        
        <x-text-input id="name" name="name" type="hidden" value="{{ $tag->id ?? 'null' }}" class="mt-1 block w-full" autocomplete="name" />
        <div class="flex items-end gap-4">
            <x-primary-button>{{ __('Delete tag') }}</x-primary-button>
        </div>
    </form>
@endauth