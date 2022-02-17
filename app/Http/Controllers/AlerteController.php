<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlerteRequest;
use App\Http\Resources\Alerte as ResourcesAlerte;
use App\Http\Resources\AlerteCollection;
use App\Models\Alerte;
use App\Models\Client;
use App\Models\Lieu;
use App\Models\TypeBien;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AlerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new AlerteCollection(Alerte::where('etat',1)->paginate(10));
       // return response()->json(new AlerteCollection(Alerte::where('etat',1)->paginate(10)));

        $alertes = DB::table('alertes')->join('clients', 'clients.id', 'client_id')
                                      ->join('users', 'users.id', 'clients.id')
                                      ->where('users.id', '=', 3) //auth('api')->user()->id
                                      ->where('alertes.etat', '=', 1)
                                      ->select('alertes.*')->get();

        $i = 0;
        foreach($alertes as $alt)
        {

            $alertes[$i]->lieu = Lieu::findOrFail($alt->lieu_id);
            $alertes[$i]->typeBien = TypeBien::findOrFail($alt->type_bien_id);
            $alertes[$i]->client = Client::findOrFail($alt->client_id);
            $alertes[$i]->client->user = User::findOrFail($alt->client->user_id);
            $i++;
        }

        return response()->json($alertes);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlerteRequest $request)
    {
        $alerte = Alerte::create([
            'montantMin' => $request->montantMin,
            'montantMax' => $request->montantMax,
            'client_id' => $request->client_id,
            'lieu_id' => $request->lieu_id,
            'type_bien_id' => $request->type_bien_id
        ]);

        return new ResourcesAlerte($alerte);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alerte $alerte)
    {
        return new ResourcesAlerte($alerte);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlerteRequest $request, Alerte $alerte)
    {
        $alerte->update([
            'montantMin' => $request->montantMin,
            'montantMax' => $request->montantMax,
            'client_id' => $request->client_id,
            'lieu_id' => $request->lieu_id,
            'type_bien_id' => $request->type_bien_id
        ]);

        return new ResourcesAlerte($alerte);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alerte $alerte)
    {
        $alerte->update(['etat' => 0]);
    }
}
