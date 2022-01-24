<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user->find($user);
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $user           = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->admin    = $request->admin;
            $user->password = Hash::make($request->password);
            $user->save();

            $success = true;
            $message = 'User register successfully';
        } catch (QueryException $e) {
            $success = false;
            $message = $e->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $user           = User::where('id', '=', $user->id)->first();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message'   => 'Bug atualizado com sucesso!',
            'data'      => $user
        ], 200);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'message'   => 'Bug removido com sucesso!'
        ], 200);
    }
}
