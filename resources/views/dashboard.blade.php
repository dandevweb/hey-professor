<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Votefor a question') }}
        </x-header>
    </x-slot>

    <x-container>
        <div class="mb-1 font-bold uppercase dark:text-gray-400">List of Questions</div>

        <div class="space-y-4 dark:text-gray-400">

            @forelse ($questions as $question)
                <x-question :question="$question" />
            @empty
                <div
                    class="rounded p-3 text-black shadow shadow-blue-500/50 dark:bg-gray-800/50 dark:text-gray-400">
                    No questions yet.
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $questions->withQueryString()->links() }}
        </div>
    </x-container>
</x-app-layout>
