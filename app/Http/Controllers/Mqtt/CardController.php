<?php

namespace App\Http\Controllers\Mqtt;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;
use Salman\Mqtt\MqttClass\Mqtt;
// use \Mqtt;
class CardController extends Controller
{


public function show($id)
    {
        $card = Card::find($id);
        $topic='some/topic';
        $message='Hello 111';
        // $this->SendMsgViaMqtt($topic, $message, $id);
        // function SendMsgViaMqtt($topic, $message, $id)
        // {
        //         // $client_id = Auth::user()->id;
        //         $mqtt = new Mqtt();


        //         $output = $mqtt->ConnectAndPublish($topic, $message);

        //         if ($output === true)
        //         {
        //             return "published";
        //         }

        //         return "Failed";
        // }
        // SendMsgViaMqtt($topic, $message, $id);
//         if (!function_exists('connectToPublish'))
// {
    // function connectToPublish($topic, $message, $client_id=null, $retain=null)
    // {
        // $mqtt = new Mqtt();
        // $m = $mqtt->ConnectAndPublish('some/topic', 'helloo ooo', $client_id=1000010, $retain=null);
        // if($m){
        //     echo 111;
        // }
        // else{
        //     echo 222;
        // }
        $mqtt = new Mqtt();
        return $mqtt->ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
        }, Null);
    // }
// }
// else{
//     return 'bbb'
// }
    }
}
