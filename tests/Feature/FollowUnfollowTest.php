<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Log;

class FollowUnfollowTest extends TestCase {

    /**
     * A user can follow by id with api
     *
     * @return void
     */
    public function test_api_user_can_follow_by_id() {

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $payload = [
            'followed_id' => $user2->id,
        ];
        $this->json('POST', '/api/users/' . $user1->id . '/follow', $payload, ['Accept' => 'application/json'])
                ->assertStatus(200)
                ->assertJson([
                    'sucess' => 'Sucessfully followed'
        ]);
    }

    /**
     * A user can unfollow by id with api
     *
     * @return void
     */
    public function test_api_user_unfollow_by_id() {

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user1->follow($user2);
        $payload = [
            'followed_id' => $user2->id,
        ];
        $this->json('POST', '/api/users/' . $user1->id . '/unfollow', $payload, ['Accept' => 'application/json'])
                ->assertStatus(200)
                ->assertJson([
                    'sucess' => 'Sucessfully unfollowed']);
    }

    /**
     * check for follow or not
     *
     * @return void
     */
    public function test_check_is_following() {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user1->follow($user2);
        $this->assertTrue($user1->isFollowing($user2));
    }

    /*
     * test to get one non exist users for try for follow
     * expected return 404 with message No query results for model [App\\User].
     */

    public function test_get_one_non_exist_user_try_for_follow() {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $payload = [
            'followed_id' => $user2->id,
        ];
        $response = $this->json('POST', '/api/users/0/follow', $payload, ['Accept' => 'application/json']);
        $response->assertStatus(200)->assertJson(['error' => "User doesn't exist"]);
        ;
    }

    /*
     * test to get one non exist users for try for unfollow
     * expected return 404 with message No query results for model [App\\User].
     */

    public function test_get_one_non_exist_user_try_for_unfollow() {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user1->follow($user2);
        $payload = [
            'followed_id' => $user2->id,
        ];
        $response = $this->json('POST', '/api/users/0/unfollow', $payload, ['Accept' => 'application/json']);
        $response->assertStatus(200)->assertJson(['error' => "User doesn't exist"]);
    }

}
