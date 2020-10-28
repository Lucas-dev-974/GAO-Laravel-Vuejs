<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\ClientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    //
    function search(Request $request)
    {

        $data = Validator::make(
            $request->input(),
            [
                'query' => 'required|max:255',
            ]
        )->validate();
        $clients = ClientModel::where('name', 'like', '%' . $data['query'] . '%')
            ->orWhere('firstname', 'like', '%' . $data['query'] . '%')
            ->get();

        return ClientResource::collection($clients);
    }
}
