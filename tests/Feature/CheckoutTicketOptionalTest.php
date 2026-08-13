<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CheckoutTicketOptionalTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_allows_checkout_without_optional_ticket_email(): void
    {
        Schema::create('comander', function ($table) {
            $table->id();
            $table->string('mesa')->nullable();
            $table->string('cliente')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::create('comander_detall', function ($table) {
            $table->id();
            $table->unsignedBigInteger('comander_id');
            $table->unsignedBigInteger('id_menu');
            $table->integer('cantidad');
            $table->decimal('costo_unitario', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('cliente')->nullable();
            $table->string('usuario')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        $user = User::factory()->create([
            'name' => 'Juan',
            'last_name' => 'Pérez',
            'email' => 'vendedor@test.com',
        ]);

        $this->actingAs($user);

        $payload = [
            'mesa' => 'Mesa 1',
            'nombre' => 'Cliente Prueba',
            'email' => '',
            'requiere_ticket' => false,
            'productos' => [
                [
                    'id_menu' => 1,
                    'name' => 'Tacos',
                    'quantity' => 2,
                    'price' => 45.00,
                ],
            ],
        ];

        $response = $this->postJson('/checkout/procesar', $payload);

        $response->assertStatus(200)
            ->assertJsonPath('success', true);

        $this->assertDatabaseHas('comander', [
            'mesa' => 'Mesa 1',
            'cliente' => 'Cliente Prueba',
        ]);
    }
}
