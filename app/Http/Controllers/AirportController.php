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
     * This method allows to re-create the Airport table with all the values from the link provided.
     * Technically only the new values should be updates in the database.
     * But for now, the quickest way to implement is to wipe up the table entries and recreate it.
     */
    function create_airports()
    {
        Airport::truncate();
        $string = file_get_contents("https://gist.githubusercontent.com/tdreyno/4278655/raw/7b0762c09b519f40397e4c3e100b097d861f5588/airports.json");
        $json = json_decode($string, TRUE);
        foreach ($json as $item) {
            $code = $item['code'];
            $name = $item['name'];
            $city = $item['city'];
            if (is_null($item['state']) == True) {
                $state = "";
            } else {
                $state = $item['state'];
            }
            $country = $item['country'];
            $airport = new Airport;
            $airport->airport_name = $name;
            $airport->airport_code = $code;
            $airport->city = $city;
            $airport->state = $state;
            $airport->country = $country;
            $airport->save();
        }
    }

    /**
     * @api {get} /airports
     * @apiGroup Airport
     * @apiName AirportList
     * @apiDescription This method will return the json file from the stored data in the database which was originally parsed from github url.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View [string] [JSON]
     */
    public function get_airports()
    {
        return view('showairports', ['name' => Airport::select('airport_name', 'airport_code', 'city', 'state', 'country')->orderBy('airport_name', 'asc')->whereNotNull('airport_name')->distinct()->get()]);

    }

    /**
     * This method will provide the list of all the flights and their details by taking in the airport code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_flights()
    {
        return view('getflights', ['name' => Trip::select('departure', 'destination')->orderBy('departure')->get()]);
    }

    /**
     * Returning the airport object
     * @param Airport $airport
     * @return Airport
     */
    public function show(Airport $airport)
    {
        return $airport;
    }

    /**
     * Provides the functionality to suggest airports stored in the DB.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(Request $request, $input)
    {
        $airports = Airport::where('city', 'like', "$input%")->orWhere('airport_code', 'like', "$input%")->orderBy('airport_code', 'asc')->limit(10)->get();
        return response()->json($airports, 200);
    }

}