<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use App\Notifications\CardAction;
use App\PhoneNumber\QTSMS;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
{
    $this->middleware('client');
}
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    public function sendCardDataNotification($user, $body) {

        $cardData = [
            'name' => 'Водоканал',
            'body' => $body,
            'thanks' => 'Спасибо.'
        ];

        $user->notify(new CardAction($cardData));
    }

    public function send_code($phone_number, $token){

        $qtsms= new QTSMS('1694101', ' 16941011', 'https://a2p-sms-https.beeline.ru/proto/http/');
        return $qtsms->post_message($token, $phone_number, 'Duedo');

    }
}
