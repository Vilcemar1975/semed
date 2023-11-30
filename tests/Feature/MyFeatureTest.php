<?php

use App\Models\Taskpublic;
use App\Http\Controllers\TaskpublicController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

it('updates articles and deletes taskpublic entries', function () {
    // Criar dados de teste
    $talk = factory(Taskpublic::class)->create([
        'date_start' => now()->subDay(),
        'hour_start' => '12:00',
        'date_end' => now()->addDays(2),
        'hour_end' => '14:00',
    ]);

    // Executar a função que você deseja testar
    TaskpublicController::publicDay();

    // Verificar se os dados foram atualizados conforme esperado
    expect(Taskpublic::where('id', $talk->id_articles)->first())
        ->toHaveProperty('status->public', 'public_day')
        ->toHaveProperty('status->active', true);

    // Verificar se a entrada em Taskpublic foi removida
    expect(Taskpublic::find($talk->id))->toBeNull();
})->throws(\Illuminate\Database\Eloquent\ModelNotFoundException::class);
