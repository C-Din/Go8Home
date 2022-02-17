<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriRequest;
use App\Http\Resources\BienCollection;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\Favori as ResourcesFavori;
use App\Http\Resources\FavoriCollection;
use App\Models\Favori;
use App\Models\Bien;
use App\Models\Client;
use App\Models\Lieu;
use App\Models\TypeBien;
use App\Models\User;
use App\Models\Visuel;
use Illuminate\Support\Facades\DB;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response()->json(new FavoriCollection(Favori::where('etat',1)->get()));
        $favoris = DB::table('favoris')->join('clients', 'clients.id', 'client_id')
                                       ->join('users', 'users.id', 'clients.id')
                                       ->where('users.id', '=', 3)// auth('api')->user()->id)
                                       ->where('favoris.etat', '=', 1)
                                       ->select('favoris.id', 'favoris.bien_id as bien', 'favoris.client_id as client', 'favoris.etat', 'favoris.created_at', 'favoris.updated_at')->get();

        $i = 0;
        foreach($favoris as $fav)
        {

            $favoris[$i]->bien = Bien::findOrFail($fav->bien);
            $favoris[$i]->bien->lieuId = Lieu::findOrFail($favoris[$i]->bien->lieu_id);
            $favoris[$i]->bien->images = Visuel::where('bien_id', '=', $fav->bien->id)->get();
            $favoris[$i]->bien->typeBienId = TypeBien::findOrFail($fav->bien->type_bien_id);
            $favoris[$i]->client = Client::findOrFail($fav->client);
            $favoris[$i]->client->user = User::findOrFail($fav->client->user_id);
             $i++;
        }
        return response()->json($favoris);
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
    public function store(FavoriRequest $request)
    {
        $favori = Favori::create([
            'bien_id' => $request->bien_id,
            'client_id' => $request->client_id
        ]);

        return new ResourcesFavori($favori);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Favori $favori)
    {
        return new ResourcesFavori($favori);
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
    public function update(FavoriRequest $request, Favori $favori)
    {
        $favori->update([
            'bien_id' => $request->bien_id,
            'client_id' => $request->client_id
        ]);

        return new ResourcesFavori($favori);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favori $favori)
    {
        $favori->update(['etat' => 0]);
    }
}
