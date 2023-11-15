<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                <div class="flex items-end justify-end">
                    <a href="{{ route('articles.create') }}" class = 'px-4 py-2 bg-green-800 dark:bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-green-500 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                        Create Article
                    </a>
                </div>
            @endauth
            @php
                $articles = App\Models\Article::all();
            @endphp
            
            @forelse ($articles as $a)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                        <div>
                            <h1 class="text-center"><a href="{{ route('articles.show', $a) }}"> {{ $a->title }} </a> </h1>
                            <div>{{ $a->full_text }}</div>
                            
                            @php
                                $tags_array = $a->tags()->get();
                                $tags = '';
                                if($tags_array){
                                    foreach ($tags_array as $t) {
                                        $tags = $tags.$t->name." ";
                                    }
                                }
                            @endphp
                            <h1>Category: {{ $a->category()->first()->name ?? '' }}</h1>
                            <h1>{{ 'Tags: '.$tags }}</h1>
                        </div>
                        @if ($a->image)
                            <img src="{{ Storage::url('public/'.$a->image) }}" />
                        @endif
                </div>
            </div>
                @auth
                    @include('articles.delete', ['article'=> $a])
                @endauth
            @empty
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-left font-bold">No articles</h1>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
