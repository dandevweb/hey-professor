<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should list all the questions', function () {
    //arrange
    //criar perguntas no banco de dados
    $user      = User::factory()->create();
    $questions = Question::factory()->count(5)->create();

    actingAs($user);

    //act
    //acessar a rota /questions
    $response = get(route('dashboard'));

    //assert
    //verificar se a lista de perguntas está sendo mostrada
    /**
     * @var Question $q
     */
    foreach ($questions as $q) {
        $response->assertSee($q->question);
    }
});

it('should paginate the result', function () {
    $user = User::factory()->create();
    Question::factory()->count(20)->create();

    actingAs($user);

    get(route('dashboard'))
        ->assertViewHas('questions', function ($value) {
            return $value instanceof \Illuminate\Pagination\LengthAwarePaginator;
        });
});
