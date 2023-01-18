<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    /**
     * UserController constructor.
     *
     */
    public function __construct() {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = User::with('address','company')->select('id', 'name', 'username','email','phone','website')->get();
        $users = $users->toArray();
        return response()->json($users);
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) { 
        $user = User::with('address','company')->select('id', 'name', 'username','email','phone','website')->find($id);
        if ($user) { 
            $user = $user->load(['following']);
            $user = $user->toArray();
            return response()->json($user);
        } else {
            return response()->json(['error' => "User doesn't exist"]);
        }
    }

}
