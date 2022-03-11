<?php

namespace App\Http\Controllers\Mqtt;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Salman\Mqtt\MqttClass\Mqtt;

// use Mqtt;
class CardController extends Controller
{


public function index()
    {
        // $card = Card::find($id);
        // $topic='kazan/cont/1/id11';
        // $message=8989;
        $topic='kazan/cont/1/id-9';
        $message='new message 11';
        $client_id='narine-cp';


    // ----------------------------------------------
    // function connectToSubscribe($topic, $client_id)
    // {
    //     $mqtt = new Mqtt();
    //     // $message='554411';
    //     // $client_id ='narine-pc';
    //     // dd($client_id);
    //      $mqtt->ConnectAndSubscribe($topic, function($topic, $msg){
    //         echo "Msg Received: \n";
    //         echo "Topic: {$topic}\n\n";
    //         echo "\t$msg\n\n";
    //         Message::create([
    //             'content'=>$msg
    //         ]);
    //     }, $client_id);

    // }
    // connectToSubscribe($topic, $client_id);
    // public function SubscribetoTopic($topic)
    // {
        $mqtt = new Mqtt();
        // $client_id = Auth::user()->id;
        $mqtt->ConnectAndSubscribe($topic, function($topic, $msg){
            Message::create([
                            'content'=>$msg
                        ]);
        }, $client_id);


    // }


    // function connectToPublish($topic, $message, $client_id, $retain=null)
    // {
    //     // dd('fff');
    //     $mqtt = new Mqtt();

    //     return $mqtt->ConnectAndPublish($topic, $message, $client_id, $retain);
    // }

    // connectToPublish($topic, $message, $client_id, $retain=null);
    }
}
