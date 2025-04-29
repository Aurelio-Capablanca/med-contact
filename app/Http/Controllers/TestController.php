<?php

namespace App\Http\Controllers;

class TestController
{

    public function indexFunction(){
        return response()->json(['message'=>'Message from Laravel app']);
    }


}
