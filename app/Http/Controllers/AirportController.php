<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/03/18
 * Time: 7:30 PM
 */

namespace App\Http\Controllers;


use App\Airport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AirportController extends Model
{
    /**
     * @api {get} /api/v1/airports/:code Autocomplete
     * @apiGroup Airport
     * @apiName AutoCOmplete
     * @apiDescription It returns all airports or city with the terms typed
     * @apiParam  Request $request [Illuminate\Http\Request]
     * @return [string]           [JSON]
     */
    public function autocomplete(Request $request)
    {
        $airports = Airport::where('city', 'like', "$request->airportOrCity%")->orWhere('code', 'like', "$request->airportOrCity%")->orderBy('code', 'asc')->limit(10)->get();
        return response()->json($airports, 200);
    }

}