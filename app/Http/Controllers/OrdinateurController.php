<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrdinateurResource;
use App\Models\OrdinateurModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdinateurController extends Controller
{
    //

    function get(Request $request)
    {
        $data = Validator::make(
            $request->input(),
            [
                'date' => 'required|max:255',
            ]
        )->validate();
        $ordis = OrdinateurModel::with(['attributions' => function ($req) use ($data) {
            $req->where('date', '=', $data['date'])
                ->with('client');
        }])->get();

        return OrdinateurResource::collection($ordis);
    }

    function add(Request $request)
    {

        $data = Validator::make(
            $request->input(),
            [
                'name' => 'required|max:255',
            ]
        )->validate();

        $ordi = new OrdinateurModel();
        $ordi->name = $data['name'];
        $ordi->save();
        return new OrdinateurResource($ordi);
    }
}
