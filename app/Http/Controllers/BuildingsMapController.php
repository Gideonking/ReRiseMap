<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingsMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagedata = [
            [
                'image1' => 'img/drone/image1_1.jpeg',
                'image2' => 'img/drone/image1_2.jpeg',
                'lat'   => 46.3,
                'lng'   => 22.3
            ],
            [
                'image1' => 'img/drone/image2_1.png',
                'image2' => 'img/drone/image2_2.png',
                'lat'   => 45.3,
                'lng'   => 22.3
            ],
            [
                'image1' => 'img/drone/image3_1.jpeg',
                'image2' => 'img/drone/image3_2.jpeg',
                'lat'   => 43.3,
                'lng'   => 23.3
            ]
        ];
        // dd($imagedata);
        return view('buildings_map', compact('imagedata'));
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
