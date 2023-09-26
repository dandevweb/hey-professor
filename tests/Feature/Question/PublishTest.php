<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should be able to publish a question', function () {
    // Arrange :: preparar
    $user     = User::factory()->create();
    $question = Question::factory()->create([
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
