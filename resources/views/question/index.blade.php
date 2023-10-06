<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('My Questions') }}
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

        <hr class="my-4 border-dashed border-gray-700" />

        <div class="mb-1 font-bold uppercase dark:text-gray-400">Drafts</div>

        <div class="space-y-4 dark:text-gray-400">
            <x-table>
                <x-table.thead>

                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <tbody>
                    @forelse ($questions->where('draft', true) as $question)
                        <x-table.tr>
                            <x-table.td>{{ $question->question }}</x-table.td>
                            <x-table.td>

                                <x-form :action="route('question.destroy', $question)" delete
                                    onsubmit="return confirm('Tem certeza?')">
                                    <button type="submit"
                                        class="text-red-500 hover:underline">Delete</button>
                                </x-form>

                                <x-form :action="route('question.publish', $question)" put>
                                    <button class="text-blue-500 hover:underline">Publish</button>
                                </x-form>

                                <a href="{{ route('question.edit', $question) }}"
                                    class="text-blue-500 hover:underline">Edit</a>

                            </x-table.td>
                        </x-table.tr>
                    @empty
                        <x-table.tr>
                            <x-table.td colspan="2">No questions found.</x-table.td>
                        </x-table.tr>
                    @endforelse


                </tbody>
            </x-table>

            <hr class="my-4 border-dashed border-gray-700" />

            <div class="mb-1 font-bold uppercase dark:text-gray-400">My Questions</div>

            <div class="space-y-4 dark:text-gray-400">
                <x-table>
                    <x-table.thead>

                        <tr>
                            <x-table.th>Question</x-table.th>
                            <x-table.th>Actions</x-table.th>
                        </tr>
                    </x-table.thead>
                    <tbody>
                        @forelse ($questions->where('draft', false) as $question)
                            <x-table.tr>
                                <x-table.td>{{ $question->question }}</x-table.td>
                                <x-table.td>
                                    <x-form :action="route('question.destroy', $question)" delete
                                        onsubmit="return confirm('Tem certeza?')">
                                        <button type="submit" class="text-red-500 hover:underline">
                                            Delete
                                        </button>
                                    </x-form>
                                    <x-form :action="route('question.archive', $question)" patch>
                                        <button type="submit"
                                            class="text-blue-500 hover:underline">
                                            Archive
                                        </button>
                                    </x-form>
                                </x-table.td>
                            </x-table.tr>
                        @empty
                            <x-table.tr>
                                <x-table.td colspan="2">No questions found.</x-table.td>
                            </x-table.tr>
                        @endforelse

                    </tbody>
                </x-table>

            </div>

            <hr class="my-4 border-dashed border-gray-700" />

            <div class="mb-1 font-bold uppercase dark:text-gray-400">Archived Questions</div>

            <div class="space-y-4 dark:text-gray-400">
                <x-table>
                    <x-table.thead>

                        <tr>
                            <x-table.th>Question</x-table.th>
                            <x-table.th>Actions</x-table.th>
                        </tr>
                    </x-table.thead>
                    <tbody>
                        @forelse ($archivedQuestions as $question)
                            <x-table.tr>
                                <x-table.td>{{ $question->question }}</x-table.td>
                                <x-table.td>

                                    <x-form :action="route('question.restore', $question)" patch>
                                        <button
                                            class="text-blue-500 hover:underline">Restore</button>
                                    </x-form>

                                </x-table.td>
                            </x-table.tr>
                        @empty
                            <x-table.tr>
                                <x-table.td colspan="2">No questions found.</x-table.td>
                            </x-table.tr>
                        @endforelse

                    </tbody>
                </x-table>


            </div>
    </x-container>
</x-app-layout>
