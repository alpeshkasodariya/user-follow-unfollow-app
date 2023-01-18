<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class SearchTest extends TestCase {

    /**
     * test search followers by name.
     *
     * @return void
     */
    public function test_search_followers_by_name() {
        $response = $this->json('GET', '/api/search-followers/ab');
        $response->assertStatus(200);
        $response->assertJsonStructure(
                [
                    [
                        'id',
                        'name',
                        'username',
                        'email',
                        'phone',
                        'website',
                        'address',
                        'company',
                        'followers', 
                    ]
                ]
        );
    }

}
