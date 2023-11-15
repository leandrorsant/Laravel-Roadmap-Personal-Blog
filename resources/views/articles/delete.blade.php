@auth
        <form method="post" action="{{ route('articles.destroy', ['article' => $article]) }}">
            @csrf
            @method('DELETE')
            
            <x-text-input id="name" name="name" type="hidden" value="{{ $article->id ?? 'null' }}" class="mt-1 block w-full" autocomplete="name" />
            <div class="flex items-end ml-2 mb-5">
                <x-danger-button>{{ __('Delete article') }}</x-danger-button>
            </div>
        </form>
@endauth