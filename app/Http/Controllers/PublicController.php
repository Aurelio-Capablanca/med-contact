<?php

namespace App\Http\Controllers;

use App\CustomAPICaller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class PublicController
{

    use CustomAPICaller;

    public function index(int $page = 1): View|Application|Factory
    {
        $contents = $this->getDataFromRequesting("WalmartSearcher-Pharma/index-pageable/" . $page) ?? [];
        return view('/public/public_view', [
            'contents' => $contents,
            'currentPage' => $page
        ]);
    }

    public function searcher(Request $search, int $page = 1): View|Application|Factory
    {
        $contents = $this->getDataFromRequesting("WalmartSearcher-Pharma/index-pageable/" . $page) ?? [];
        return view('/public/public_view', [
            'contents' => $contents,
            'currentPage' => $page
        ]);
    }


    public function details(Request $request): View|Application|Factory
    {
        $data = json_decode($request->input('data'), true);
        return view('/public/selected_product', compact('data'));
    }




}
