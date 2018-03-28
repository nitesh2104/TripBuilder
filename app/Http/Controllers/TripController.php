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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function viewTrips(){
        $trips = Trip::all();
        $data = [];
        foreach ($trips as $item) {
            $data[] = [
                'id' => $item->id,
                'departure' => $item->departure,
                'destination' => $item->destination
            ];
        }
        return view('showtrips', ['name' => Trip::all()]);
    }
    /**
     * Obtains the airport name from the user input.
     * Then moves forward to obtaining the airport code from the Airport table.
     * Then returns the information of the airport code.
     * This will be then used to obtain final information for the flight details.
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     * @internal param $formData
     */
    function get_Trips()
    {   $where_clause = ['departure'=>request()->from, 'destination'=>request()->to];
        $flights = Trip::where($where_clause)->get();

        $data = [];
        foreach ($flights as $item) {
            $data[] = [
                'id' => $item->id,
                'departure' => $item->departure,
                'destination' => $item->destination
            ];
        }
//        return view('showtrips', ['name' => $data]);
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

