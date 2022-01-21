<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App\Http\Resources\UserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function me(): UserResource
    {
        return new UserResource(auth()->user());
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
    }

}
