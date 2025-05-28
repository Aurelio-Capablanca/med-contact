<?php

namespace App;

use Illuminate\Support\Facades\Http;

trait CustomAPICaller
{
    //
    protected string $service_base_url = 'http://127.0.0.1:9100/api/';

    public function getDataFromRequesting($urlComplement){
        $url = $this->service_base_url.$urlComplement;
        $response = Http::get($url);
        return $response->successful() ? $response->json() : null;
    }

}
