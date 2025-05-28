<?php

namespace App\Http\Controllers;

use App\CustomAPICaller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PublicController
{

    use CustomAPICaller;

    public function index(int $page = 1): View|Application|Factory
    {
        $contents = $this->getDataFromRequesting("WalmartSearcher-Pharma/index-pageable/".$page) ?? [];
        return view('/public/public_view', [
            'contents' => $contents,
            'currentPage' => $page
        ]);
    }


}
