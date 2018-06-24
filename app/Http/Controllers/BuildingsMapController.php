<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;

class BuildingsMapController extends Controller
{

    public $imagedata = [
            [
                'image1' => 'img/drone/image1_1.jpeg',
                'image2' => 'img/drone/image1_2.jpeg',
                'lat'   =>  44.449663, 
                'lng'   => 26.086306
            ],
            [
                'image1' => 'img/drone/image2_1.png',
                'image2' => 'img/drone/image2_2.png',
                'lat'   =>  44.329663, 
                'lng'   => 26.096306
            ],
            [
                'image1' => 'img/drone/image3_1.jpeg',
                'image2' => 'img/drone/image3_2.jpeg',
                'lat'   =>  44.429663, 
                'lng'   => 26.096306
            ]
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($imgId)
    {
        $markers = Pin::where('pin_type_id', 2)->get();

        // dd($this->imagedata);
        $imgdata= $this->imagedata[$imgId];

        $randomLat = rand(0, 10) / 100;
        $randomLng = rand(0, 10) / 100;
        $imgdata['lat'] +=  $randomLat;
        $imgdata['lng'] +=  $randomLng;

        $this->processData($this->imagedata[$imgId]);

        $nrImg = count($this->imagedata);
        return view('buildings_map', compact('imgdata', 'imgId', 'nrImg', 'markers'));

        // return redirect()->route('buildings-map-data')->with('image', $image);
    }

    public function processData($image)
    {
        // $imgdata = $image;
        // return view('buildings_map', compact('imgdata'));
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
