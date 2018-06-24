<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;

class AlertMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buildings_map');
    }

    public function putMarkers()
    {
        $markers = Pin::where('pin_type_id', 1)->get();
        return view('put_markers_map', compact('markers'));
    }
    

    // save pin to database
    public function saveMarker(Request $request)
    {
        $p = Pin::create($request->except(['message', '_token']));

        // Alert::info('Alerta adaugata pe harta');

        $response = array(
          'status' => 'success',
          'msg' => $request->message . $request->details .'added',
          'message' => 'Alerta adaugata pe harta',
          'message-type' => 'success'
        );

        $request->session()->flash('message', 'Alerta adaugata pe harta.');
        $request->session()->flash('message-type', 'success');

        dd($p);
        return response()->json($response); 
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
