<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienRequest;
use App\Http\Resources\Bien as ResourcesBien;
use App\Http\Resources\BienCollection;
use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return new  BienCollection(Bien::where('etat',1)->get());
        if($request->type_achat != null && $request->lieu_id != null)
        {
            $biens = Bien::where('typeAchat', $request->type_achat)->where('lieu_id', $request->lieu_id)->where('etat', 1)->get();
            return response()->json(new BienCollection($biens));
        }
        return response()->json(new  BienCollection(Bien::where('etat',1)->get()));
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
    public function store(BienRequest $request)
    {
        $bien = Bien::create([
            'nombreChambre' => $request->nombreChambre,
            'superficie' => $request->superficie,
            'montant' => $request->montant,
            'etage' => $request->etage,
            'nombreEtage' => $request->nombreEtage,
            'typeAchat' => $request->typeAchat,
            'description' => $request->description,
            'type_bien_id' => $request->type_bien_id,
            'lieu_id' => $request->lieu_id
        ]);

        return new ResourcesBien($bien);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bien $bien)
    {
        /*return  Bien::where('id', $bien->id)->with('lieu:id,region,ville,quartier,bp')
                                            ->with('typeBien:id,nomTypeBien,etat')
                                            ->withCount('visuel', 'favori')->get();*/
        return $bien->visuel()->with('bien:id')->get();
        //return response()->json(new ResourcesBien($bien));
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
    public function update(BienRequest $request, Bien $bien)
    {
        $bien->update([
            'nombreChambre' => $request->nombreChambre,
            'superficie' => $request->superficie,
            'montant' => $request->montant,
            'etage' => $request->etage,
            'nombreEtage' => $request->nombreEtage,
            'typeAchat' => $request->typeAchat,
            'description' => $request->description,
            'type_bien_id' => $request->type_bien_id,
            'lieu_id' => $request->lieu_id
        ]);

        return new ResourcesBien($bien);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bien $bien)
    {
        $bien->update(['etat' => 0]);
    }
}
