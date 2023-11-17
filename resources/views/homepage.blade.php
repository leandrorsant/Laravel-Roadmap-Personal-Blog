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
                    <a href="{{ route('articles.create') }}" class = 'px-4 py-2 bg-green-800 dark:bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-500 focus:bg-green-700 dark:focus:bg-green-800 active:bg-green-900 dark:active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 '>
                        Create Article
                    </a>
                </div>
            @endauth
            @php
                $articles = App\Models\Article::all();
            @endphp
            
            @forelse ($articles as $a)
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-2">
                @auth
                    <x-dropdown class="z-40">
                        <x-slot name="trigger">
                            <div class="bg-black flex justify-between">
                                <button class="absolute right-0 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('articles.edit', ['article'=> $a])">
                                Edit
                            </x-dropdown-link>
                            <x-dropdown-link>
                                <form method="post" action="{{ route('articles.destroy', ['article' => $a]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex items-end gap-4">
                                        <button type = 'submit' class ='w-full text-left'>
                                            Delete
                                        </button>
                                    </div>
                                </form>

                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    @endauth
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                  

                        <div>
                            {{-- @auth
                                @include('articles.edit', ['article'=> $a])
                            @endauth --}}
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
                        {{-- @auth
                            @include('articles.delete', ['article'=> $a])
                        @endauth --}}
                </div>
            </div>
              
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
