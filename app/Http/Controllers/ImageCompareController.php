<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;

class ImageCompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// init the image objects
		$image1 = new Imagick();
		$image2 = new Imagick();

		// set the fuzz factor (must be done BEFORE reading in the images)
		$image1->SetOption('fuzz', '2%');

		// read in the images
		// $image1->readImage("php_step29_actual.png");
		$image1->readImage("https://raw.githubusercontent.com/mapbox/pixelmatch/master/test/fixtures/4a.png");
		$image2->readImage("https://raw.githubusercontent.com/mapbox/pixelmatch/master/test/fixtures/4b.png");

		// compare the images using METRIC=1 (Absolute Error)
		$result = $image1->compareImages($image2, 1);

		// print out the result
		// echo "The image comparison 2% Fuzz factor is: " . $result[1];
		dd("The image comparison 2% Fuzz factor is: " . $result[1]);

        return view('compare_images');
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
