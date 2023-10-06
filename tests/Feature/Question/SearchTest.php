<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should be able to search a question by text', function () {
    $user = User::factory()->create();
    Question::factory()->count(5)->create([
        'question' => 'Something else?',
    ]);
    Question::factory()->create([
        'question' => 'How to create a test?',
    ]);

    actingAs($user);

    $response = get(route('dashboard', ['search' => 'create a test']));

    $response->assertDontSee('Something else?');

    $response->assertSee('How to create a test?');
});
