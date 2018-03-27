<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/03/18
 * Time: 7:30 PM
 */

namespace App\Http\Controllers;


use App\Airport;
use App\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AirportController extends Model
{
    /**
     * @api {get} /airports
     * @apiGroup Airport
     * @apiName AirportList
     * @apiDescription This method will return the json file from the stored data in the database which was originally parsed from github url.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View [string] [JSON]
     */
    public function get_airports()
    {
        return view('showairports', ['name' => Airport::select('airport_name')->orderBy('airport_name', 'asc')->whereNotNull('airport_name')->distinct()->get()]);
//        $string = file_get_contents("https://gist.githubusercontent.com/tdreyno/4278655/raw/7b0762c09b519f40397e4c3e100b097d861f5588/airports.json");
//        $json = json_decode($string, TRUE);
//        foreach ($json as $item) {
//            $code = $item['code'];
//            $name = $item['name'];
//            $city = $item['city'];
//            if (is_null($item['state']) == True){
//                $state ="";
//            }
//            else{
//                $state = $item['state'];
//            }
//            $country = $item['country'];
//            $airport = new Airport;
//            $airport->airport_name = $name;
//            $airport->airport_code = $code;
//            $airport->city = $city;
//            $airport->state = $state;
//            $airport->country = $country;
////            $airport->save();
//            echo "Code: ".$code.", Name: ".$name.", State: ".$state.", Country: ".$country."<br/>";
//        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_flights()
    {
        return view('getflights', ['name' => Trip::select('departure', 'destination')->orderBy('departure')->get()]);
    }

    public function show(Airport $airport)
    {
        return $airport;
    }

    /**
     * @apiGroup Airports
     * @apiDescription Returns autosuggested airports
     * @apiParam  Request $request [Illuminate\Http\Request]
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse [string}[JSON]
     */
    public function autocomplete(Request $request)
    {
        $airports = Airport::where('city', 'like', "$request->input%")->orWhere('airport_code', 'like', "$request->input%")->orderBy('airport_code', 'asc')->limit(10)->get();
        return response()->json($airports, 200);
    }

}