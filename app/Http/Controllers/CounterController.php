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

        // {
        //     "ip": "127.0.0.1",
        //     "city": {
        //         "country_id": 0,
        //         "id": 0,
        //         "lat": 16.17,
        //         "lon": 107.83,
        //         "name_ru": "",
        //         "name_en": "",
        //         "name_uk": "",
        //         "name_de": "",
        //         "name_fr": "",
        //         "name_it": "",
        //         "name_es": "",
        //         "name_pt": "",
        //         "okato": "",
        //         "vk": 0,
        //         "population": 0,
        //         "tel": "",
        //         "post": ""
        //     },
        //     "region": {
        //         "id": 0,
        //         "lat": 0,
        //         "lon": 0,
        //         "name_ru": "",
        //         "name_en": "",
        //         "name_uk": "",
        //         "name_de": "",
        //         "name_fr": "",
        //         "name_it": "",
        //         "name_es": "",
        //         "name_pt": "",
        //         "iso": "",
        //         "timezone": "",
        //         "okato": "",
        //         "auto": "",
        //         "vk": 0,
        //         "utc": 0
        //     },
        //     "country": {
        //         "id": 233,
        //         "iso": "VN",
        //         "continent": "AS",
        //         "lat": 16.17,
        //         "lon": 107.83,
        //         "name_ru": "Вьетнам",
        //         "name_en": "Vietnam",
        //         "name_uk": "В'єтнам",
        //         "name_de": "Vietnam",
        //         "name_fr": "Viêt Nam",
        //         "name_it": "Vietnam",
        //         "name_es": "Vietnam",
        //         "name_pt": "Vietnã",
        //         "timezone": "Asia/Ho_Chi_Minh",
        //         "area": 329560,
        //         "population": 89571130,
        //         "capital_id": 1581130,
        //         "capital_ru": "Ханой",
        //         "capital_en": "Hanoi",
        //         "cur_code": "VND",
        //         "phone": "84",
        //         "neighbours": "CN,LA,KH",
        //         "vk": 55,
        //         "utc": 7
        //     },
        //     "error": "",
        //     "request": -1,
        //     "created": "2023.12.18",
        //     "timestamp": 1702853219
        // }
    }
}
