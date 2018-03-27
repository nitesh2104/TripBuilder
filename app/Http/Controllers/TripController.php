<?php
namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 26/03/18
 * Time: 9:05 PM
 */
/**
 * @api {post} /api/v1/flights/search Search Flights
 * @apiGroup Flight
 * @apiName GetFlights
 * @apiDescription Return all flights with the origin and destination requested
 * @apiParam  Request $request Two params are required to find a flight. $from and $to
 * @return [string]           [JSON]
 */
public function getAllFlights(Request $request){
    $from = $request->from;
    $to = $request->to;
    $flights = Trip::where('departure', $from)->where('destination', $to)->get();

    $data = [];
    foreach ($flights as $item) {
        $data[] = [
            'id' => $item->id,
            'name_departure' => $item->departureAirport->name,
            'name_destination' => $item->destinationAirport->name,
            'departure_airport_code' => $item->departure_airport_code,
            'destination_airport_code' => $item->destination_airport_code
        ];
    }

    return response()->json($data, 200);
}
use App\Trip;
use Illuminate\Support\Facades\Request;