<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeBienRequest;
use App\Http\Resources\TypeBien as ResourcesTypeBien;
use App\Http\Resources\TypeBienCollection;
use App\Models\TypeBien;
use Illuminate\Http\Request;

class TypeBienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new TypeBienCollection(TypeBien::where('etat',1)->paginate(10));
        return response()->json(new  TypeBienCollection(TypeBien::where('etat',1)->paginate(10)));
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
    public function store(TypeBienRequest $request)
    {
        $typeBien = TypeBien::create([
            'nomTypeBien' => $request->nomTypeBien
        ]);

        return new ResourcesTypeBien($typeBien);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ResourcesTypeBien(TypeBien::findOrFail($id));
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
    public function update(TypeBienRequest $request, $id)
    {
        $typeBien = TypeBien::findOrFail($id);
        $typeBien->update([
            'nomTypeBien' => $request->nomTypeBien
        ]);

        return new ResourcesTypeBien($typeBien);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeBien = TypeBien::findOrFail($id);
        $typeBien->update(['etat' => 0]);
    }
}
