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
        return Bug::with('user')->where('user_id', '=', auth()->id())->get();
    }

    public function store(Request $request): JsonResponse
    {
        $bug                = new Bug();
        $bug->title         = $request->title;
        $bug->description   = $request->description;
        $bug->type          = $request->type;
        $bug->status        = $request->status;
        $bug->user_id       = auth()->id();
        $bug->save();
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
    public function update(Request $request, Bug $bug): JsonResponse
    {
        $bug                = Bug::where('id', '=', $bug->id)->first();

        $bug->title         = $request->title;
        $bug->description   = $request->description;
        $bug->type          = $request->type;
        $bug->status        = $request->status;
        $bug->save();
        return response()->json([
            'message'   => 'Bug atualizado com sucesso!',
            'data'      => $bug
        ], 200);
    }

    public function destroy(Bug $bug): JsonResponse
    {
        $bug->delete();

        return response()->json([
            'message'   => 'Bug removido com sucesso!'
        ], 200);
    }
}
