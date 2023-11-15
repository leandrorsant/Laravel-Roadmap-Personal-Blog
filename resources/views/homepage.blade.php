<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                @include('articles.create')
            @endauth
            @php
                $articles = App\Models\Article::all();
            @endphp
            
            @forelse ($articles as $a)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-2">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                        <div>
                            <h1><a href="{{ route('articles.show', $a) }}"> {{ 'Title: '.$a->title }} </a> </h1>
                            <h1>{{ 'Full Text: '.$a->full_text }}</h1>
                            
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
                </div>
            </div>
                @auth
                    @include('articles.delete', ['article'=> $a]);
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
