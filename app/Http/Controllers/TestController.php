<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spsn\Kafka\Constants\MessageTypes\SpsnNotifySrv\SpsnNotifyMessageTypes;
use Spsn\Kafka\Constants\SpsnAppServiceNames;
use Spsn\Kafka\Messages\SpsnKafkaMessageInvitation;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;
use Spsn\Kafka\SpsnKafkaProducer;

class TestController extends Controller {
    public function index(Request $request) {
        $producer = new SpsnKafkaProducer(SpsnAppServiceNames::SPSN_NOTIFY);
        $message = new SpsnKafkaProducerMessage(
            messageType: SpsnNotifyMessageTypes::INVITE_PARTNER,
            message: new SpsnKafkaMessageInvitation(
                extMessageId: 'ext_message_id',
                senderOperatorId: 'sender_operator_id',
                senderId: 'sender_id',
                senderCountryCode: 'sender_country_code',
                senderCompany: 'sender_company',
                senderInn: 'sender_inn',
                senderKpp: 'sender_kpp',
                senderBin: 'sender_bin',
                senderEmail: 'sender_email',
                recipientOperatorId: 'recipient_operator_id',
                recipientId: 'recipient_id',
                recipientCountryCode: 'recipient_country_code',
                recipientCompany: 'recipient_company',
                recipientInn: 'recipient_inn',
                recipientKpp: 'recipient_kpp',
                recipientBin: 'recipient_bin',
                recipientEmail: 'recipient_email',
            ),
        );

        return $producer->sendMessage($message);
    }
}