<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Carbon\Carbon;

class ViewController extends Controller
{
    function index() {
        return view('index');
    }

    function stats() {

        Counter::query()->where('created_at', '<', Carbon::now()->subDays())->delete();
        $array = [
            ['Hour', 'Посетители'],
            ['23'],
            ['22'],
            ['21'],
            ['20'],
            ['18'],
            ['17'],
            ['16'],
            ['15'],
            ['14'],
            ['13'],
            ['12'],
            ['11'],
            ['10'],
            ['9'],
            ['8'],
            ['7'],
            ['6'],
            ['5'],
            ['4'],
            ['3'],
            ['2'],
            ['1'],
            ['00'],
        ];

        $array2 = [

        ];

        $visiters = Counter::query()->get();

            foreach($visiters as $places) {
                array_push($array2, $places['country/city']);
            }
            $places = array_count_values($array2);
    
            $array2 = [
                array_keys($places),$places
            ];

        foreach($visiters as $time) {
             if($time['created_at']->format('d:m') == Carbon::now()->format('d:m')) {
                foreach($array as $key => $value) {
                    if($value[0] == $time['created_at']->format('H') && (count($value) == 1)) {
                        array_push($array[$key], 1);
                    } else if ($value[0] == $time['created_at']->format('H') && !is_string($value[1] ?? '')) {
                        $array[$key][1] = $value[1] + 1;
                    }
                }
             }
        }
        return view('stats.index', ['array' => $array, 'array2' => $array2]);
        }    

}



