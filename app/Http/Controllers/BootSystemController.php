<?php

namespace App\Http\Controllers;

use App\Models\Enum\EnumClassificationBug;
use App\Models\Enum\EnumStatusBug;
use Illuminate\Http\Request;

class BootSystemController extends Controller
{
    public function bootSystem():array
    {

//        $user = new User();

        return
            [
                'statusBug'          => EnumStatusBug::all(),
                'classificationsBug' => EnumClassificationBug::all(),
            ];
    }
}
