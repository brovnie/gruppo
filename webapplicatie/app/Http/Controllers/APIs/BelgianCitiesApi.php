<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class BelgianCitiesApi extends Controller
{

    public function getCity() {
        $response = Http::withHeaders([
            'X-Parse-Application-I' => 'QYWkrwfH68esSmWIdaWuUaDYpwVbRBRHVz1O7Rfw',
            'X-Parse-REST-API-Key' => 'Va03yNnsxx7hw4LPRjtBbDPjw3tRSnH47QBlhwJF' 
            ])->get('https://parseapi.back4app.com/classes/Belgiumcities_City?limit=1000&order=name&keys=name');
        
            if ($response->getStatusCode() == 200) { // 200 OK
                echo 'test';
                $data = json_decode($response->getBody(), true); 
                return $data;
            } else {
                echo $response->getStatusCode();
            }
    }
    
    public function test() {  
        return  'hello';
    }
}

   /* $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/Belgiumcities_City?limit=1000&order=name&keys=name');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'X-Parse-Application-Id: QYWkrwfH68esSmWIdaWuUaDYpwVbRBRHVz1O7Rfw', // This is your app's application id
        'X-Parse-REST-API-Key: Va03yNnsxx7hw4LPRjtBbDPjw3tRSnH47QBlhwJF' // This is your app's REST API key
    ));
    $data = json_decode(curl_exec($curl)); // Here you have the data that you need
    print_r(json_encode($data, JSON_PRETTY_PRINT));
    curl_close($curl);*/
