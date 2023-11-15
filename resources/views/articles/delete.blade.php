@auth
    <form method="post" action="{{ route('articles.destroy', ['article' => $article]) }}">
        @csrf
        @method('DELETE')
        
        <x-text-input id="name" name="name" type="hidden" value="{{ $article->id ?? 'null' }}" class="mt-1 block w-full" autocomplete="name" />
        <div class="flex items-end gap-4">
            <x-primary-button>{{ __('Delete article') }}</x-primary-button>
        </div>
    </form>
@endauth