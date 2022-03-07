<?php

namespace App\Http\Controllers\Mqtt;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Salman\Mqtt\MqttClass\Mqtt;
// use Mqtt;
class CardController extends Controller
{


public function show($id)
    {
        // $card = Card::find($id);
        // $topic='kazan/cont/1/id11';
        // $message=8989;
        $topic='kazan/cont/1/id-6';
        $message='new message 11';
        // $client_id='narine-pc';


    // ----------------------------------------------
    // function connectToSubscribe($topic, $client_id)
    // {
        $mqtt = new Mqtt();
        $message='554411';
        $client_id ='narine-pc';
        // dd($client_id);
        return $mqtt->ConnectAndSubscribe('kazan/cont/1/id-6', function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
        }, $client_id);

    // }
    // connectToSubscribe($topic, $client_id);



    // function connectToPublish($topic, $message, $client_id, $retain=null)
    // {
    //     // dd('fff');
    //     $mqtt = new Mqtt();

    //     return $mqtt->ConnectAndPublish($topic, $message, $client_id, $retain);
    // }

    // connectToPublish($topic, $message, $client_id, $retain=null);
    }
}
