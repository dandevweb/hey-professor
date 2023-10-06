<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\Question;
use Illuminate\View\View;
use Illuminate\Http\{RedirectResponse};

class QuestionController extends Controller
{
    public function index(): View
    {
        return view('question.index', [
            'questions'         => user()->questions,
            'archivedQuestions' => user()->questions()->onlyTrashed()->get(),
        ]);
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'question' => [
                'required',
                'min:10',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (substr($value, -1) !== '?') {
                        $fail(
                            'Are you sure that is a question? It missing the question mark in the end.'
                        );
                    }
                },
            ],
        ]);

        user()->questions()
            ->create([
                ...$attributes,
                'draft' => true,
            ]);

        return back();
    }

    public function edit(Question $question): View
    {
        $this->authorize('update', $question);

        return view('question.edit', compact('question'));
    }

    public function update(Question $question): RedirectResponse
    {
        $this->authorize('update', $question);

        $attributes = request()->validate([
            'question' => [
                'required',
                'min:10',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (substr($value, -1) !== '?') {
                        $fail(
                            'Are you sure that is a question? It missing the question mark in the end.'
                        );
                    }
                },
            ],
        ]);

        $question->update($attributes);

        return to_route('question.index');
    }

    public function destroy(Question $question): RedirectResponse
    {
        $this->authorize('destroy', $question);

        $question->forceDelete();

        return back();
    }

    public function archive(Question $question): RedirectResponse
    {
        $this->authorize('archive', $question);

        $question->delete();

        return back();
    }

    public function restore(int $id): RedirectResponse
    {
        // $this->authorize('restore', $question);

        $question = Question::withTrashed()->findOrFail($id);

        $question->restore();

        return back();
    }
}
