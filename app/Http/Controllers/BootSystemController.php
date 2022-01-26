<?php

namespace App\Http\Controllers;

use App\Models\{Status, Type};

class BootSystemController extends Controller
{
    public function bootSystem():array
    {
        return
            [
                'statusBug'          => Status::all(),
                'classificationsBug' => Type::all(),
            ];
    }
}
