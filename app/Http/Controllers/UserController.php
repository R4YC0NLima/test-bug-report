<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function me(User $user)
    {
        $userLogged = Auth::user();

        return response()->json([
            'user' => $userLogged
        ], Response::HTTP_OK);
    }
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return response()->json([
            'users' => $users
        ], Response::HTTP_OK);
    }
}
