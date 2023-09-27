<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should be able  to update a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->for($user, 'createdBy')->create(['draft' => true]);

    actingAs($user);

    put(route('question.update', $question), [
        'question' => 'This is a valid question?',
    ])->assertRedirect();

    expect($question->fresh()->question)->toBe('This is a valid question?');
});
