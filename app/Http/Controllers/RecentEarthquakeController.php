<?php

namespace App\Http\Controllers;

// require('/vendor/autoload.php');
use GuzzleHttp\Client as GuzzleClient;
use Guzzle\Plugin\Oauth\OauthPlugin;

use Illuminate\Http\Request;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use \Carbon\Carbon as Carbon;
use Goutte\Client as GoutteClient;

class RecentEarthquakeController extends Controller
{
    public function pastHourRomania() {
        try {
            $client = new GuzzleClient();
            
            $res = $client->request('GET', 'http://www.seismicportal.eu/fdsnws/event/1/query?format=json&limit=1000');
            
            if ($res->getStatusCode()==200) {
                $responseBody = $res->getBody()->getContents();
                $geoArray = json_decode($responseBody, true);
                // $earthquakes = $this->findRomania($responseBody);
                
                $earthquakes = [];
                foreach ($geoArray['features'] as $geoFeature) {
                    // Cutremure doar din romania
                    if($geoFeature['properties']['flynn_region']=='ROMANIA') {

                        $dateNow = Carbon::now();
                        $dateEarthquake = Carbon::parse($geoFeature['properties']['time']);

                        if( ($dateNow->diffInHours($dateEarthquake) < 1 
                            && $dateNow->diffInMinutes($dateEarthquake) > 0) 
                            || ($dateNow->diffInHours($dateEarthquake) == 1 
                                && $dateNow->diffInMinutes($dateEarthquake) == 0) 
                        ) {

                            array_push($earthquakes, $geoFeature['properties']);
                        }
                    }
                }


                // Use Google Maps API to find location name based on lat and long
                foreach ($earthquakes as &$earthquake) {
                    try {
                        if($earthquake['lon'] > 0) {
                            $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$earthquake['lat'].','.$earthquake['lon']);
                            $earthquake["location"] = json_decode($res->getBody()->getContents(),true)["results"][0]["formatted_address"];
                        }

                    }
                    catch(Exception $e){
                    }
                }

                return view('earthquakes-info.romania', ['earthquakes' => $earthquakes, 'title' => 'Cutremure în ultima oră în România']);
            }
        } catch(GuzzleHttp\Exception\ClientException $e) {
            return "Error or can't connect to host";   
        }
        return "Error or no data";
    }


    public function allRomania() {
        try {
            $client = new GuzzleClient();
            // $res = $client->request('GET', 'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_day.geojson');
            // $res = $client->request('GET', 'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_day.geojson');

            // SUPER!!! gives data in json format + for Romania as well
            // Documentation:
            // http://www.seismicportal.eu/fdsnws/event/1/
            // $res = $client->request('GET', 'http://www.seismicportal.eu/fdsnws/event/1/query?limit=10');
            $res = $client->request('GET', 'http://www.seismicportal.eu/fdsnws/event/1/query?format=json&limit=1000');
            //2.5+ past hour
            // $res = $client->request('GET', 'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson');
            // $res = $client->request('GET', 'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson');
            // $res = $client->request('GET', 'https://graph.facebook.com/820882001277849/photos?access_token=1078938562283367|7SMlEvfB5VXvFrVSwiuJjukpHm0');
            // $res = $client->request('GET', 'https://graph.facebook.com/INCDFP/?access_token=EAAPVSfW9R2cBAImNDBPcuC1a4Y8ZCLATtgFkxdlddK6BY23gm2WWtRRFkOKcXZCCpclro1cvc5T3yIiFZBw45KlZAgwIzMpWoKLXG0n4pUQ7G7XGjEHzjPx8tzFLdZBrH7hSiaGDaPSRpGzmjAMy8v0Hd1nLzLsmjI0lRCi12quNPZARaT8ZBezYTlK8hpe4lIZD');
            if ($res->getStatusCode()==200) {
                $responseBody = $res->getBody()->getContents();
                $responseArray = json_decode($responseBody, true);
                $earthquakes = $this->findRomania($responseBody);



                foreach ($earthquakes as &$earthquake) {
                    try {
                        if($earthquake['lon'] > 0) {
                            $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$earthquake['lat'].','.$earthquake['lon']);
                            $earthquake["location"] = json_decode($res->getBody()->getContents(),true)["results"][0]["formatted_address"];
                        }

                    }
                    catch(Exception $e){

                    }
                }
          
                
                return view('earthquakes-info.romania', ['earthquakes' => $earthquakes, 'title' => 'Cele mai recente cutremure in Romania']);
            }
        } catch(GuzzleHttp\Exception\ClientException $e) {
            return "Error or can't connect to host";   
        }
        // echo $res->getStatusCode();
        // 200
           
        return "Error or no data";
    }


    private function findKey($geoJson, $key) {
        $geoArray = json_decode($geoJson, true);
        dd($geoArray);
        foreach ($geoArray['properties'] as $geoFeature) {
            if (in_array($key, $geoFeature['properties']['keys'])) {
            // if (in_array($key, $geoFeature['properties'])) {
                return $geoFeature['properties'];
            }
        }
    }


    function findRomania($geoJson) {
        $geoArray = json_decode($geoJson, true);
        $response = [];
        foreach ($geoArray['features'] as $geoFeature) {
            if($geoFeature['properties']['flynn_region']=='ROMANIA') {
                array_push($response, $geoFeature['properties']);
            }
        }
        return $response;
    }

    function findRomania2($geoJson) {
        $geoArray = json_decode($geoJson, true);
        $response = [];

        foreach ($geoArray['features'] as $geoFeature) {
            // if (in_array($key, $geoFeature['properties']['keys'])) {
            if ($geoFeature['properties']['geometry'] && $geoFeature['properties']['geometry']['flynn_region']=='Romania') {
                array_push($response, $geoFeature['properties']);
                }
        }
        return $response;
    }


    public function raw() {
    try{
        $client = new GuzzleClient();
                
        // SUPER!!! gives data in json format + for Romania as well
        // Documentation:
        // http://www.seismicportal.eu/fdsnws/event/1/
                // $res = $client->request('GET', 'http://www.seismicportal.eu/fdsnws/event/1/query?limit=10');
                $res = $client->request('GET', 'http://www.seismicportal.eu/fdsnws/event/1/query?format=json&limit=1000');
                 if ($res->getStatusCode()==200) {
            
                $responseBody = $res->getBody()->getContents();
                return $res->getBody();
            }
            } catch(GuzzleHttp\Exception\ClientException $e) {
                return "Error or can't connect to host";   
            }
            // echo $res->getStatusCode();
            // 200
           
            return "Error or no data";
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
