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


it('should make sure that only question with status DRAFT can be updated', function () {
    $user             = User::factory()->create();
    $questionNotDraft = Question::factory()->for($user, 'createdBy')->create(['draft' => false]);
    $draftQuestion    = Question::factory()->for($user, 'createdBy')->create(['draft' => true]);

    actingAs($user);

    put(route('question.update', $questionNotDraft))->assertForbidden();
    put(route('question.update', $draftQuestion), ['question' => 'New Question'])->assertRedirect();
});

it('should make sure that only person who created the question can update it', function () {
    $rightUser = User::factory()->create();
    $wrongUser = User::factory()->create();

    $question = Question::factory()->create([
        'created_by' => $rightUser->id,
        'draft'      => true,
    ]);

    actingAs($wrongUser);
    put(route('question.update', $question->id))
        ->assertForbidden();

    actingAs($rightUser);
    put(route('question.update', $question->id), ['question' => 'New Question'])
        ->assertRedirect();
});
