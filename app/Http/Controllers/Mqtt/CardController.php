<?php

namespace App\Http\Controllers\Mqtt;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;


use Salman\Mqtt\MqttClass\Mqtt;
// use Mqtt;
class CardController extends Controller
{


public function show($id)
    {
        $card = Card::find($id);
        $topic='kazan/cont/1/status';
        $message='Hello 111';
        $mqtt = new Mqtt();
// $mqtt->host='zv1632.su';
        dd($mqtt);
        $client_id = '125478';
        $output = $mqtt->ConnectAndPublish($topic, $message, $client_id);

        if ($output === true)
        {
            return "published";
        }

        return "Failed";
        // $this->SendMsgViaMqtt($topic, $message, $id);
        // function SendMsgViaMqtt($topic, $message, $id)
        // {
        //         // $client_id = Auth::user()->id;
                // $mqtt = new Mqtt();


                // $output = $mqtt->ConnectAndPublish($topic, $message);

                // if ($output === true)
                // {
                //     return "published";
                // }

                // return "Failed";
        // }
        // SendMsgViaMqtt($topic, $message, $id);
//         if (!function_exists('connectToPublish'))
// {
    // function connectToPublish($topic, $message, $client_id=null, $retain=null)
    // {
        // $mqtt = new Mqtt();
        // $m = $mqtt->ConnectAndPublish('kazan/cont/1/id', 'helloo ooo');
        // if($m){
        //     dd(111);
        // }
        // else{
        //     dd(222);
        // }
    // }
        // $mqtt = new Mqtt();
        // return $mqtt->ConnectAndSubscribe($topic, function($topic, $msg){
        //     echo "Msg Received: \n";
        //     echo "Topic: {$topic}\n\n";
        //     echo "\t$msg\n\n";
        // }, Null);
    // }
// }
// else{
//     return 'bbb'
// }
    }
}
