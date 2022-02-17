<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommoditeBienRequest;
use App\Http\Requests\CommoditeRequest;
use App\Http\Resources\CommoditeBien as ResourcesCommoditeBien;
use App\Http\Resources\CommoditeBienCollection;
use App\Models\CommoditeBien;
use Illuminate\Http\Request;

class CommoditeBienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new CommoditeBienCollection(CommoditeBien::where('etat',1)->paginate(20));
        return response()->json(new  CommoditeBienCollection(CommoditeBien::where('etat',1)->paginate(10)));
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
    public function store(CommoditeBienRequest $request)
    {
        $commoditeBien = CommoditeBien::create([
            'nombre' => $request->nombre,
            'bien_id' => $request->bien_id,
            'commodite_id' => $request->commodite_id
        ]);

        return new ResourcesCommoditeBien($commoditeBien);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CommoditeBien $commoditeBien)
    {
        return dd($commoditeBien);
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
    public function update(CommoditeRequest $request, CommoditeBien $commoditeBien)
    {
        $commoditeBien ->update([
            'nombre' => $request->nombre,
            'bien_id' => $request->bien_id,
            'commodite_id' => $request->commodite_id
        ]);

        return new ResourcesCommoditeBien($commoditeBien);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommoditeBien $commoditeBien)
    {
        $commoditeBien->update(['etat' => 0]);
    }
}
