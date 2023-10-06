<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Votefor a question') }}
        </x-header>
    </x-slot>

    <x-container>
        <div class="mb-1 font-bold uppercase dark:text-gray-400">List of Questions</div>

        <div class="space-y-4 dark:text-gray-400">

            <form action="{{ route('dashboard') }}" method="get" class="flex items-center gap-2">
                @csrf
                <x-text-input type="search" name="search" value="{{ request('search') }}"
                    class="w-full" />

                <x-primary-button type="submit">
                    Search
                </x-primary-button>
            </form>

            @forelse ($questions as $question)
                <x-question :question="$question" />
            @empty
                <div class="flex flex-col justify-center text-center dark:text-gray-300">

                    <div class="flex justify-center">
                        <x-draw.searching width="300" />
                    </div>

                    <div class="mt-6 text-2xl font-bold dark:text-gray-400">
                        Question not found.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $questions->withQueryString()->links() }}
        </div>
    </x-container>
</x-app-layout>
