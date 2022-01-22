<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Resources\UserResource;
use App\Http\Resources\UserResource;
use App\Models\Bug;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BugController extends Controller
{
    public function index()
    {
        return Bug::all();
    }

    public function store(Request $request, Bug $bug): JsonResponse
    {
        return response()->json([
            'message'   => 'Bug cadastrado com sucesso!',
            'data'      => $bug->create($request->all())
        ], 201);
    }

    public function show(Bug $bug)
    {
        return $bug->find($bug);
    }

    //todo: Ajustar o update
//    public function update(Request $request, Bug $bug): JsonResponse
//    {
//        return response()->json([
//            'message'   => 'Bug atualizado com sucesso!',
//            'data'      => $bug->update($request->all())
//        ], 200);
//    }

    public function destroy(Bug $bug): JsonResponse
    {
        $bug->delete();

        return response()->json([
            'message'   => 'Bug removido com sucesso!'
        ], 200);
    }
}
