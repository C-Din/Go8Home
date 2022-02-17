<?php

namespace App\Http\Controllers;

use App\Http\Requests\LieuRequest;
use App\Http\Resources\Lieu as ResourcesLieu;
use App\Http\Resources\LieuCollection;
use App\Models\Lieu;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new LieuCollection(Lieu::where('etat',1)->paginate(10));
        return response()->json(new  LieuCollection(Lieu::where('etat',1)->paginate(10)));
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
    public function store(LieuRequest $request)
    {
        $lieu = Lieu::create([
            'region' => $request->region,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'bp' => $request->bp
        ]);

        return new ResourcesLieu($lieu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lieu = Lieu::where('id', $id)->where('etat', '=', 1)->first();
        return new ResourcesLieu($lieu);
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
    public function update(LieuRequest $request, $id)
    {
        $lieu = Lieu::findOrFail($id);
        $lieu->update([
            'region' => $request->region,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'bp' => $request->bp
        ]);

        return new ResourcesLieu($lieu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lieu = Lieu::findOrFail($id);
        $lieu->update([
            'etat' => 0
        ]);
    }
}
