<?php
namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 26/03/18
 * Time: 9:05 PM
 */
use App\Airport;
use App\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TripController extends Model
{
    /**
     * @param Request $request
     * @param $formData
     * @return \Illuminate\Http\JsonResponse
     */
    function get_Trips(Request $request, $formData)
    {
        $from = Airport::select('airport_code')->where('airport_name', 'like', "$formData->from")->get();
        $to = Airport::select('airport_code')->where('airport_name', 'like', "$formData->from")->get();
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
     * @param Request $request
     * @return bool
     * @internal param $Obj
     */
    function add_Trips(Request $request, $formdata)
    {
        $trip = new Trip();
        $trip->departure = $formdata->from;
        $trip->destination = $formdata->to;
        return $trip->save();
    }

    /**
     * @param Request $request
     * @param $formData
     * @return mixed
     * @internal param $departure
     * @internal param $destination
     */
    function delete_Trips(Request $request, $formData)
    {
        $filter = ['departure' => $formData->from, 'destination' => $formData->to];
        return Trip::where($filter)->delete();

    }
}

