<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spsn\Kafka\Constants\SpsnServicesNames;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;
use Spsn\Kafka\SpsnKafkaProducer;

class TestController extends Controller {
    public function index(Request $request) {
        $producer = new SpsnKafkaProducer(SpsnServicesNames::SPSN_NOTIFY);
        $message = new SpsnKafkaProducerMessage([
            'test' => '1231313112',
        ]);

        $producer->sendMessage($message);
    }
}