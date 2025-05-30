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

    public function searcher(Request $request, int $page = 1): View|Application|Factory
    {
        $content_search = array();
        $term = $request->input('data');
        $walmart_data = $this->getDataFromRequesting("WalmartSearcher-Pharma/search-term/" . $term) ?? [];
        $economicas_data = $this->getDataFromRequesting("FarmaciasEconomicas/search-by/" . $term . "/0/" . $page . "/12") ?? [];
        $san_nicolas_data = $this->getDataFromRequesting("SanNicolas/search-term/" . $term) ?? [];
        foreach ($walmart_data as $data){
            array_push($content_search, $data);
        }
        foreach ($economicas_data as $data){
            array_push($content_search, $data);
        }
        foreach ($san_nicolas_data as $data){
            array_push($content_search, $data);
        }
        return view('/public/public_view', [
            'contents' => $content_search,
            'currentPage' => $page
        ]);
    }


    public function details(Request $request): View|Application|Factory
    {
        $data = json_decode($request->input('data'), true);
        return view('/public/selected_product', compact('data'));
    }


}
