<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Dashboard') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form :action="route('question.store')">
            <x-textarea label="Question" name="question" />

            <x-btn.primary>
                Save
            </x-btn.primary>

            <x-btn.reset>
                Cancel
            </x-btn.reset>

        </x-form>

        <div class="space-y-4 dark:text-gray-400">

            @forelse ($questions as $question)
                <x-question :question="$question" />
            @empty
                <div class="p-3 text-black rounded shadow dark:bg-gray-800/50 dark:text-gray-400 shadow-blue-500/50">
                    No questions yet.
                </div>
            @endforelse
        </div>
    </x-container>
</x-app-layout>
