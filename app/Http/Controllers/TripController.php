<?php
namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 26/03/18
 * Time: 9:05 PM
 */
use App\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class TripController extends Model
{
    function getTrips(Request $request)
    {
//        $from = $request->from;
//        $to = $request->to;
        $flights = Trip::where('departure', "AAA")->where('destination', "YUL")->get();

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
}

