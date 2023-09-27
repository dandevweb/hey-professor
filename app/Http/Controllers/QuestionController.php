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
            'questions' => user()->questions,
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

    public function destroy(Question $question): RedirectResponse
    {
        $this->authorize('destroy', $question);

        $question->delete();

        return back();
    }
}
