<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    function getInfo(Request $request) {
        $data = json_decode($request->input('data'));
        if(!is_string($data) && !is_object($data)) {
            abort('403');
        }
        $ip = $request->getClientIp();

        $ipFind = Counter::query()->where('ip', $ip)->get('ip');
        if(!empty($ipFind[100])) {
            return redirect()->back();
        };
        $user_agent = $request->header('user-agent');
        $is_bot = empty($user_agent) || empty($data) || preg_match(
            "~(Google|Yahoo|Rambler|Bot|Yandex|Spider|Snoopy|Crawler|Finder|Mail|curl|request|Guzzle|Java)~i",
            $user_agent
        );
        $is_bot ? abort('403') : '';

        if(property_exists($data, 'city') && property_exists($data, 'country')) {
            $CorrectPlace = $data->city->name_ru ? $data->city->name_ru : $data->country->name_ru;
            if($CorrectPlace == '') $CorrectPlace = 'Не опознан';
        } else {
            $CorrectPlace = 'Не опознан';
        }

        Counter::create([
            'ip' => $ip,
            'country/city' => $CorrectPlace,
            'user-agent' => $user_agent,
        ]);
        return redirect()->back();
    }
}
