<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase {

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_users() {
        $user1 = User::factory()->create();
        Address::factory()->count(1)->create(['user_id'=>$user1->id]); 
        Company::factory()->count(1)->create(['user_id'=>$user1->id]); 
        
        $response = $this->json('GET', '/api/users');
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
                    ]
                ]
        );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_by_id() {
        $user1 = User::factory()->create();
        Address::factory()->count(1)->create(['user_id'=>$user1->id]); 
        Company::factory()->count(1)->create(['user_id'=>$user1->id]); 
        $response = $this->json('GET', '/api/users/'.$user1->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(
                [ 
                        'id',
                        'name',
                        'username',
                        'email',
                        'phone',
                        'website',
                        'address',
                        'company',  
                ]
        );
    }

    /*
      test to get one non exist users for follow
      expected return 404 with message No query results for model [App\\User].
     */

    public function test_get_one_non_exist_user() { 
        $response = $this->json('GET', '/api/users/0');
        $response->assertStatus(200);
    }

}
