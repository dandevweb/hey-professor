<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseMissing, delete};

it('should be able to destroy a question', function () {
    // Arrange :: preparar
    $user     = User::factory()->create();
    $question = Question::factory()
        ->for($user, 'createdBy')
        ->create([
            'draft' => true,
        ]);

    actingAs($user);

    //Act :: agir
    delete(route('question.destroy', $question->id))
        ->assertRedirect();

    assertDatabaseMissing('questions', [
        'id' => $question->id,
    ]);
});

it('should make sure that only person who created the question can destroy it', function () {
    $rightUser = User::factory()->create();
    $wrongUser = User::factory()->create();

    $question = Question::factory()->create([
        'created_by' => $rightUser->id,
    ]);

    actingAs($wrongUser);

    delete(route('question.destroy', $question->id))
        ->assertForbidden();

    actingAs($rightUser);

    delete(route('question.destroy', $question->id))
        ->assertRedirect();
});
