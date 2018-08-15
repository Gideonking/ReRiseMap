<?php

namespace App\Http\Controllers;

// require('/vendor/autoload.php');
use GuzzleHttp\Client as GuzzleClient;
use Guzzle\Plugin\Oauth\OauthPlugin;

use Illuminate\Http\Request;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

use Goutte\Client as GoutteClient;

class RecentEarthquakeController extends Controller
{
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index() {

// // $client = new Client('http://api.twitter.com/1');
// $client = new Client('https://graph.facebook.com/820882001277849/photos');
// $oauth = new OauthPlugin(array(
//     // 'consumer_key'    => 'my_key',
//     // 'consumer_secret' => 'my_secret',
//     // 'token'           => 'my_token',
//      'access_token' => '1078938562283367|7SMlEvfB5VXvFrVSwiuJjukpHm0',
//     // 'token_secret'    => 'my_token_secret'
// ));
// $client->addSubscriber($oauth);

// $response = $client->get('statuses/public_timeline.json')->send();
// // $response = $client->get('statuses/public_timeline.json');
// return $response;
// }
    public function index1()
    {

// try {
        // $client = new \GuzzleHttp\GuzzleClient();
        

          $stack = HandlerStack::create();

            $auth = new Oauth1([
                // 'consumer_key' => Config::get('twitter.consumer_key'),
                // 'consumer_secret' => Config::get('twitter.consumer_secret'),
                // 'token' => Config::get('twitter.token')
                'access_token' => '1078938562283367|7SMlEvfB5VXvFrVSwiuJjukpHm0'
                // 'token_secret' => Config::get('twitter.token_secret')
            ]);

            $stack->push($auth);

            $client = new Client([
                'base_uri' => 'https://graph.facebook.com/820882001277849/photos',
                'handler' => $stack,
                'auth' => 'oauth'
            ]);


// // create our http client (Guzzle)
// $http = new Client('http://coop.apps.knpuniversity.com', array(
//     'request.options' => array(
//         'exceptions' => false,
//     )
// ));

// $accessToken = 'abcd1234def67890';

// $request = $http->post('/api/2/eggs-collect');
// $request->addHeader('Authorization', 'Bearer '.$accessToken);
// $response = $request->send();
// echo $response->getBody();

// echo "\n\n";
}

public function index33() {

    $client = new GoutteClient();
    // $crawler = $client->request('GET', 'https://m.emsc.eu/earthquake/latest.php?min_mag=n/a&max_mag=n/a&date=n/a&euromed=World');
    $crawler = $client->request('GET', 'http://www2.infp.ro/');

    $messages = [''];
    // Get the latest post in this category and display the titles
    $crawler->filter('body')->each(function ($node) use ($messages) {
        print $node->text()."\n";
        array_push($messages,$node->text());
    });

    return $messages;

}

public function allRomania() {
try{
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
        // echo $res->getHeaderLine('content-type');
// dd($res);
            $responseBody = $res->getBody()->getContents();
            // $responseBody = $res->json();
            // dd(json_decode($responseBody));
            //GeoJSON
            $responseArray = json_decode($responseBody, true);
            // dd($responseArray);
            // $earthquakes = $this->findKey($responseBody, 'geometry');
            $earthquakes = $this->findRomania($responseBody);
            
            // dd($earthquakes);
            // dd($responseArray);
            // foreach( $responseBody as $item) {
            //     dd($item);
            // }
            // $responseArray = $responseBody->toArray();
            return view('earthquakes-info.romania', ['earthquakes' => $earthquakes]);
        }
        } catch(GuzzleHttp\Exception\ClientException $e) {
            return "Error or can't connect to host";   
        }
        // echo $res->getStatusCode();
        // 200
       
        return "Error or no data";
        
// // Send an asynchronous request.
// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
// $promise = $client->sendAsync($request)->then(function ($response) {
//     echo 'I completed! ' . $response->getBody();
// });
// $promise->wait();

//         return "Hello";
    }


        function findKey($geoJson, $key) {
        $geoArray = json_decode($geoJson, true);
        foreach ($geoArray['features'] as $geoFeature) {
            // if (in_array($key, $geoFeature['properties']['keys'])) {
            if (in_array($key, $geoFeature['properties'])) {
                return $geoFeature['properties'];
                }
        }
    }


    function findRomania($geoJson) {
        $geoArray = json_decode($geoJson, true);
        $response = [];
        foreach ($geoArray['features'] as $geoFeature) {
            // if (in_array($key, $geoFeature['properties']['keys'])) {
            // if (in_array('geometry', $geoFeature['properties'])) {
                if($geoFeature['properties']['flynn_region']=='ROMANIA') {
                    array_push($response, $geoFeature['properties']);
                }
                // }    
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
        
// // Send an asynchronous request.
// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
// $promise = $client->sendAsync($request)->then(function ($response) {
//     echo 'I completed! ' . $response->getBody();
// });
// $promise->wait();

//         return "Hello";
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
