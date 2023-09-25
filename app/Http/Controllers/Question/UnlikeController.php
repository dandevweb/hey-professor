<?php

namespace App\Http\Controllers\Question;

use App\Models\Question;
use Illuminate\Http\{RedirectResponse, Request};
use App\Http\Controllers\Controller;

class UnlikeController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {

        user()->unlike($question);

        return back();
    }
}
