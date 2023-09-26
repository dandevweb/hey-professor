<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Closure;
use Illuminate\Http\{RedirectResponse, Request};

class QuestionController extends Controller
{
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

        Question::query()
            ->create([
                ...$attributes,
                'draft' => true,
            ]);

        return to_route('dashboard');
    }
}
