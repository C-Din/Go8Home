<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommoditeRequest;
use App\Http\Resources\Commodite as ResourcesCommodite;
use App\Http\Resources\CommoditeCollection;
use App\Models\Commodite;
use Illuminate\Http\Request;

class CommoditeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new CommoditeCollection(Commodite::where('etat',1)->paginate(10));
        return response()->json(new  CommoditeCollection(Commodite::where('etat',1)->paginate(10)));
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
    public function store(CommoditeRequest $request)
    {
        $commodite = Commodite::create([
            'nomCom' => $request->nomCom,
            'iconCom' => $request->iconCom
        ]);

        return new ResourcesCommodite($commodite);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commodite $commodite)
    {
        return new ResourcesCommodite($commodite);
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
    public function update(CommoditeRequest $request, Commodite $commodite)
    {
        $commodite->update([
            'nomCom' => $request->nomCom,
            'iconCom' => $request->iconCom
        ]);

        return new ResourcesCommodite($commodite);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commodite $commodite)
    {
        $commodite->update(['etat' => 0]);
    }
}
