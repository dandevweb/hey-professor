<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should be able to publish a question', function () {
    // Arrange :: preparar
    $user     = User::factory()->create();
    $question = Question::factory()
        ->for($user, 'createdBy')
        ->create([
            'draft' => true,
        ]);

    actingAs($user);

    //Act :: agir
    put(route('question.publish', $question->id))
        ->assertRedirect();

    $question->refresh();

    //Assert :: verificar
    expect($question)->draft->toBeFalse();
});

it('should make sure that only person who created the question can publish it', function () {
    $rightUser = User::factory()->create();
    $wrongUser = User::factory()->create();

    $question = Question::factory()->create([
        'created_by' => $rightUser->id,
    ]);

    actingAs($wrongUser);

    put(route('question.publish', $question->id))
        ->assertForbidden();

    actingAs($rightUser);

    put(route('question.publish', $question->id))
        ->assertRedirect();
});
