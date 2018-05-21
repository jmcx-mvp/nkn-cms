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

        $retData = [
            'code' => 1000,
            'info' => 'success',
            'data' => $data
        ];

        return response()->json($retData);
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
