<?php

namespace Tests\Feature;

use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TravelsListTest extends TestCase
{
    use RefreshDatabase;

    public function test_travels_list_returns_correct_paginated_data(): void
    {
        Travel::factory()->count(16)->create(['is_public' => true]);

        $response = $this->get('/api/travels');

        $response->assertStatus(200);
        $response->assertJsonCount(15, key: 'data');
        $response->assertJsonPath(path: 'meta.last_page', expect: 2);
    }

    public function test_travels_list_shows_only_public_records(): void
    {
        $publicTravel = Travel::factory()->create(['is_public' => true]);
        Travel::factory()->create();

        $response = $this->get('/api/travels');

        $response->assertStatus(200);
        $response->assertJsonCount(1, key: 'data');
        // the first element
        $response->assertJsonPath(path: 'data.0.name', expect: $publicTravel->name);
    }
}
