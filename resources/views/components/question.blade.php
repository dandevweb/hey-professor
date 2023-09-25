@props(['question'])

<div class="p-3 text-black rounded shadow dark:bg-gray-800/50 dark:text-gray-400 shadow-blue-500/50">
    <div class="flex items-center justify-between">
        <span>
            {{ $question->question }}
        </span>

        <div>
            <x-form :action="route('question.like', $question)">
                <button type="submit" class="flex items-start space-x-1 text-green-500 hover:text-green-300">
                    <x-icons.thumbs-up class="w-5 h-5 cursor-pointer " />
                    <span>{{ $question->likes }}</span>
                </button>
            </x-form>

            <a href="{{ route('question.like', $question) }}"
                class="flex items-start space-x-1 text-red-500 hover:text-red-300">
                <x-icons.thumbs-down class="w-5 h-5 cursor-pointer " />
                <span>{{ $question->unlikes }}</span>
            </a>
        </div>
    </div>
</div>
