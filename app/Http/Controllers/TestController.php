<?php

namespace App\Http\Controllers;

class TestController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['message'=>'Message from Laravel app']);
    }


}
