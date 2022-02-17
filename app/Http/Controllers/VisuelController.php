<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisuelRequest;
use App\Http\Resources\Visuel as ResourcesVisuel;
use App\Http\Resources\VisuelCollection;
use App\Models\Visuel;
use Illuminate\Http\Request;

class VisuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VisuelCollection(Visuel::where('etat',1)->paginate(10));
        return response()->json(new  VisuelCollection(Visuel::where('etat',1)->paginate(10)));
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

    public function saveImage(VisuelRequest $request)
    {
        if($request->hasFile('urlVisuel'))
        {
            $image = $request->file('urlVisuel');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/storage'), $imageName);
            $imageUrl = url("/storage/".$imageName);
        }

        return $imageUrl;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisuelRequest $request)
    {
        $visuel = Visuel::create([
            'typeVisuel' => $request->typeVisuel,
            'urlVisuel' => $this->saveImage($request),
            'bien_id' => $request->bien_id
        ]);

        return new ResourcesVisuel($visuel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Visuel $visuel)
    {
        return new ResourcesVisuel($visuel);
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
    public function update(VisuelRequest $request, Visuel $visuel)
    {
        $visuel->update([
            'typeVisuel' => $request->typeVisuel,
            'urlVisuel' => $this->saveImage($request),
            'bien_id' => $request->bien_id
        ]);

        return new ResourcesVisuel($visuel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visuel $visuel)
    {
        $visuel->update(['etat' => 0]);
    }
}
