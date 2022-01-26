<?php

namespace App\Http\Controllers;

use App\Http\Requests\BugFormRequest;
use App\Models\Bug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class BugController extends Controller
{
    /**
     * @return Builder[]|Collection
     */
    public function index()
    {
        $bugs      = Bug::with(['type', 'status', 'user'])->get();
        $user      = auth()->user();
        return $bugs->filter(function ($item) use ($user){
            if ($item->status_id === 2) {
                if ($item->user_id === $user->id || $user->admin === 1) {
                    return true;
                } else {
                    return false;
                }
            }

            return true;
        });
    }

    /**
     * @param BugFormRequest $request
     * @return JsonResponse
     */
    public function store(BugFormRequest $request): JsonResponse
    {
        $bug                = new Bug();
        $bug->title         = $request->title;
        $bug->description   = $request->description;
        $bug->type_id       = $request->type_id;
        $bug->status_id     = $request->status_id;
        $bug->user_id       = auth()->id();
        $bug->save();

        return response()->json([
            'message'   => 'Bug cadastrado com sucesso!',
            'data'      => $bug->create($request->all())
        ], 201);
    }

    /**
     * @param Bug $bug
     * @return mixed
     */
    public function show(Bug $bug)
    {
        return $bug->load(['type', 'status', 'user']);
    }

    /**
     * @param BugFormRequest $request
     * @param Bug $bug
     * @return JsonResponse
     */
    public function update(BugFormRequest $request, Bug $bug): JsonResponse
    {
        $bug                = Bug::where('id', '=', $bug->id)->first();

        $bug->title         = $request->title;
        $bug->description   = $request->description;
        $bug->type_id       = $request->type_id;
        $bug->status_id     = $request->status_id;
        $bug->save();

        return response()->json([
            'message'   => 'Bug atualizado com sucesso!',
            'data'      => $bug
        ], 200);
    }


    /**
     * @param Bug $bug
     * @return JsonResponse
     */
    public function destroy(Bug $bug): JsonResponse
    {
        $bug->delete();

        return response()->json([
            'message'   => 'Bug removido com sucesso!'
        ], 200);
    }
}
