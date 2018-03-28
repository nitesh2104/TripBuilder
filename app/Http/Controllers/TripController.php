<?php
namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 26/03/18
 * Time: 9:05 PM
 * This file has not been tested yet due to issues with POST request not working.
 * Once the POST request is successfully done, then the logic to further work on
 * the functions will be implemented and this comment will be removed.
 */
use App\Airport;
use App\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TripController extends Model
{
    /**
     * Obtains the airport name from the user input.
     * Then moves forward to obtaining the airport code from the Airport table.
     * Then returns the information of the airport code.
     * This will be then used to obtain final information for the flight details.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @internal param $formData
     */
    function get_Trips(Request $request)
    {
        $from = Airport::select('airport_code')->where('airport_name', 'like', "$request->from")->get();
        $to = Airport::select('airport_code')->where('airport_name', 'like', "$request->to")->get();
        $flights = Trip::where('departure', $from)->where('destination', $to)->get();

        $data = [];
        foreach ($flights as $item) {
            $data[] = [
                'id' => $item->id,
                'departure' => $item->departure,
                'destination' => $item->destination
            ];
        }
        return response()->json($data, 200);
    }

    /**
     * Creates instances of the airport code/ name in the trip table.
     * @return bool
     * @internal param Request $request
     * @internal param $Obj
     */
    function add_Trips()
    {
        $trip = new Trip();
        $trip->departure = request()->from;
        $trip->destination = request()->to;
        return $trip->save();
    }

    /**
     * Deletes instances of the airport code/name in the database.
     * @return mixed
     * @internal param Request $request
     * @internal param $formData
     * @internal param $departure
     * @internal param $destination
     */
    function delete_Trips()
    {
        $filter = ['departure' => request()->from, 'destination' => request()->to];
        return Trip::where($filter)->delete();

    }
}

