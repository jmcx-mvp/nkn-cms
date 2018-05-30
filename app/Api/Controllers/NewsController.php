<?php

namespace App\Api\Controllers;

use App\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::where('status', '1')->orderBy('id', 'desc')->paginate(10);
        foreach ($data as &$item) {
            $item['focus_img_url'] = env('MY_API_HTTP_HEAD', 'http://localhost/') . $item['focus_img_url'];
        }

        $retData = [
            'code' => 1000,
            'info' => 'success',
            'data' => $data
        ];

        return response()->json($retData);
    }
}
