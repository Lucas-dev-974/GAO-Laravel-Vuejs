<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttributionResource;
use App\Models\AttributionModel;
use App\Models\ClientModel;
use App\Models\OrdinateurModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributionController extends Controller
{
    //

    function add(Request $request)
    {
        $data = Validator::make(
            $request->input(),
            [
                'id_ordinateur' => 'required',
                'date' => 'required',
                'horaire' => 'required',
                'id_client' => '',
                'firstname' => '',
                'name' => '',
            ]
        )->validate();

        if (isset($data['id_client']) && !empty($data['id_client'])) {
            $client = ClientModel::find($data['id_client']);
        } else {
            $client = $this->createClient($data['name'], $data['firstname']);
        }

        $ordi = OrdinateurModel::find($data['id_ordinateur']);

        if (isset($client) && isset($ordi)) {

            $attribution = new AttributionModel();
            $attribution->horaire = $data['horaire'];
            $attribution->date = $data['date'];
            $attribution->client()->associate($client);
            $attribution->ordinateur()->associate($ordi);
            $attribution->save();

            return new AttributionResource($attribution);
        } else {
            //TODO ThrowException panier not exist
        }
    }

    private function createClient($name, $firstname)
    {
        $client = new ClientModel();
        $client->name = $name;
        $client->firstname = $firstname;
        $client->save();
        return $client;
    }
}
