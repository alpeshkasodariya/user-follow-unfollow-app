<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller {

    /**
     * SearchController constructor.
     *
     */
    public function __construct() {
        
    }

    /**
     * Get the search followers by name 
     *
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($name = null) {

        if ($name != "") {
            $users = User::with(['address','company'])->where('name', 'like', '%' . $name . '%')->select('id', 'name', 'username','email','phone','website')->get();
            
             
            
        } else {
            $users = User::with('address','company')->select('id', 'name', 'username','email','phone','website')->load(['followables'])->get();
        }
        $users = $users->toArray();
        return response()->json($users, 200);
    }

}
