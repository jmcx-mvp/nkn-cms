<?php

namespace App\Api\Controllers;

use App\Emails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\Common\RetJson;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Emails::all();
        $str = '';
        foreach ($data as $item) {
            $str .= $item['address'] . '; ';
        }

        return response()->json($str);
    }

    /**
     * Save new email address.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = [
            'address' => $request->get('address')
        ];

        return RetJson::format(Emails::create($data));
    }
}
