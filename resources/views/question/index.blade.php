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

        <hr class="my-4 border-gray-700 border-dashed" />

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

                                <x-form :action="route('question.destroy', $question)" delete>
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </x-form>

                                <x-form :action="route('question.publish', $question)" put>
                                    <button class="text-blue-500 hover:underline">Publish</button>
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

            <hr class="my-4 border-gray-700 border-dashed" />

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
                                    <x-form :action="route('question.destroy', $question)" delete>
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
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



        </div>
    </x-container>
</x-app-layout>
