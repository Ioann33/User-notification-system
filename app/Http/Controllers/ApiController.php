<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getUsers(Request $request){
        $resArr = [];
        $users = User::query()
            ->select()
            ->where('name', 'ilike', "%$request->name%")
            ->get();
        foreach ($users as $user){
            $resArr[] = [
                'id' => $user->id,
                'text' => $user->name,
            ];
        }

        return response()->json(['results' => $resArr]);
    }
}
