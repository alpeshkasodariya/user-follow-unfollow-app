<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FolllowUnfollowController extends Controller {

    /**
     * FolllowUnfollow constructor.
     *
     */
    public function __construct() {
        
    }

    /**
     * Follow the user given by their username and return the user if successful.
     *
     * @param $id and Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow($id, Request $request) {
         
        $request->followed_id;
        $user1 = User::find($id);
        $user2 = User::find($request->followed_id);
        if ($user1 && $user2) {
            if (!$user1->isFollowing($user2)) {
                $user1->follow($user2);
                return response()->json(['sucess' => 'Sucessfully followed']);
            } else {
                return response()->json(['error' => 'Already followed ']);
            }
        } else {
            return response()->json(['error' => "User doesn't exist"]);
        }
    }

    /**
     * Unfollow the user given by their username and return the user if successful.
     *
     * @param $id and Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unFollow($id, Request $request) {
        $request->followed_id;
        $user1 = User::find($id);
        $user2 = User::find($request->followed_id);
        if ($user1 && $user2) {
            if (!$user1->isFollowing($user2)) {
                return response()->json(['error' => "User has not follow other user"]);
            } else {
                $user1->unfollow($user2);
                return response()->json(['sucess' => 'Sucessfully unfollowed']);
            }
        } else {
            return response()->json(['error' => "User doesn't exist"]);
        }
    }

}
