<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spsn\Kafka\Constants\MessageTypes\SpsnNotifySrv\SpsnNotifyMessageTypes;
use Spsn\Kafka\Constants\SpsnAppServiceNames;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;
use Spsn\Kafka\SpsnKafkaProducer;

class TestController extends Controller {
    public function index(Request $request) {
        $producer = new SpsnKafkaProducer(SpsnAppServiceNames::SPSN_NOTIFY);
        $message = new SpsnKafkaProducerMessage([
            'test' => 'ss',
            'date' => Carbon::now(),
        ], SpsnNotifyMessageTypes::VERIFY_EMAIL);

        return $producer->sendMessage($message);
    }
}
