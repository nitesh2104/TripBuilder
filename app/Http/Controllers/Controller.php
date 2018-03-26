<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use League\Flysystem\Exception;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function landing_page()
    {
        return view('welcome');
    }

    public function main_page()
    {
        return view('main');
    }

    /**
     * This method will parse the json file from the github url mentioned and will store the data in the database.
     */
    public function get_airports(){
        $string = file_get_contents("https://gist.githubusercontent.com/tdreyno/4278655/raw/7b0762c09b519f40397e4c3e100b097d861f5588/airports.json");
        $json = json_decode($string, TRUE);
        foreach ($json as $item) {
            $code = $item['code'];
            $name = $item['name'];
            $city = $item['city'];
            if (is_null($item['state']) == True){
                $state ="";
            }
            else{
                $state = $item['state'];
            }
            $country = $item['country'];
            $airport = new Airport;
            $airport->airport_name = $name;
            $airport->airport_code = $code;
            $airport->city = $city;
            $airport->state = $state;
            $airport->country = $country;
//            $airport->save();
            echo "Code: ".$code.", Name: ".$name.", State: ".$state.", Country: ".$country."<br/>";
        }
    }
}
