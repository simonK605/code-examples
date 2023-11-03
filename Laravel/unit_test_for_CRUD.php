<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ExampleControllerTest extends TestCase
{
    /**
     * Test get data.
     *
     * @return void
     */
    public function test_get_data(): void
    {
        $user = User::factory();

        Sanctum::actingAs($user);

        Test::factory()->create();

        $response = $this->getJson('/test');
        $response->assertStatus(200);
    }

    /**
     * Test create data.
     *
     * @return void
     */
    public function test_create_data(): void
    {
        $user = User::factory();

        Sanctum::actingAs($user);

        $response = $this->getJson('/test/create');

        $response->assertStatus(200);
    }

    /**
     * Test store data.
     *
     * @return void
     */
    public function test_store_data(): void
    {
        $user = User::factory();

        Sanctum::actingAs($user);

        $response = $this->postJson('/test', [
            'title' => 'Test title',
            'description' => 'Test description',
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test edit data.
     *
     * @return void
     */
    public function test_edit_data(): void
    {
        $user = User::factory();

        Sanctum::actingAs($user);
        $newData = Test::factory()->create();

        $response = $this->getJson("/test/$newData->id/edit");
        $response->assertStatus(200);
    }

    /**
     * Test update data.
     *
     * @return void
     */
    public function test_update_data(): void
    {
        $user = User::factory();

        Sanctum::actingAs($user);

        $newData = Test::factory()->create();

        $response = $this->putJson("/test/$newData->id", [
            'title' => 'Updated title',
            'description' => 'Updated description',
        ]);
        $response->assertStatus(302);
    }

    /**
     * Test delete data.
     *
     * @return void
     */
    public function test_delete_data(): void
    {
        $user = User::factory();

        Sanctum::actingAs($user);

        $newData = Test::factory()->create();

        $response = $this->deleteJson("/test/$newData->id");
        $response->assertStatus(302);
    }
}