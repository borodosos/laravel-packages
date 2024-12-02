<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spsn\Kafka\Constants\MessageTypes\SpsnNotifySrv\SpsnNotifyMessageTypes;
use Spsn\Kafka\Constants\SpsnAppServiceNames;
use Spsn\Kafka\Messages\SpsnKafkaMessageContent;
use Spsn\Kafka\Messages\SpsnKafkaMessageInvitation;
use Spsn\Kafka\Messages\SpsnKafkaMessageServiceDocument;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;
use Spsn\Kafka\SpsnKafkaProducer;
use Str;

class TestController extends Controller {
    public function testInvitationMessage(Request $request) {
        $producer = new SpsnKafkaProducer(SpsnAppServiceNames::SPSN_NOTIFY);
        $message = new SpsnKafkaProducerMessage(
            messageType: SpsnNotifyMessageTypes::INVITE_PARTNER,
            message: new SpsnKafkaMessageInvitation([
                "message_id" => Str::uuid(),
                "sender_operator" => [
                    "id" => Str::uuid(),
                ],
                "recipient_operator" => [
                    "id" => Str::uuid(),
                ],
                "sender" => [
                    "id" => Str::uuid(),
                    "country_code" => 'country_code',
                    "company" => 'company',
                    "inn" => 'senderInn',
                    "kpp" => '12412',
                    "bin" => '1251',
                    "email" => 'asgfasf@mail.ru',
                ],
                "recipient" => [
                    "id" => Str::uuid(),
                    "country_code" => 'country_code',
                    "company" => 'company',
                    "inn" => 'senderInn',
                    "kpp" => '12412',
                    "bin" => '1251',
                    "email" => 'asgfasf@mail.ru',
                ],
            ]),
        );

        return $producer->sendMessage($message);
    }

    public function testContentMessage() {
        $producer = new SpsnKafkaProducer(SpsnAppServiceNames::SPSN_NOTIFY);
        $message = new SpsnKafkaProducerMessage(
            messageType: SpsnNotifyMessageTypes::INVITE_PARTNER,
            message: new SpsnKafkaMessageContent([
                'message_id' => '112',
                "workflow_id" => "0da3c555-cd1c-44ba-a535-1b4e31055b45",
                "document_id" => "396bf5e3-4efa-457e-a81a-bdd2b82e837b",
                "message_type" => "content",
                "sender_operator" => [
                    "id" => "833471b4-980d-41f8-b6de-0b7facd52d3d",
                ],
                "recipient_operator" => [
                    "id" => "0909b0a2-5e5a-4ee9-a940-afb29234595c",
                ],
                "sender" => [
                    "id" => "9d0d9e56-23cc-4211-90d5-6d0913da7b94",
                ],
                "recipient" => [
                    "id" => "54660909-2df1-4ff6-97cb-f00bd4acd026",
                ],
                "document" => [
                    "signature_required" => true,
                    "signature_type" => "attached",
                    "meta" => [
                        "document_name" => "file.xlsx",
                        "artifacts" => [
                            [
                                "type" => "sign",
                                "id" => "09d5ff01-15b8-422b-b67d-57eb57990bcd",
                            ],
                            [
                                "type" => "content",
                                "id" => "972a2b4c-06e0-4035-a35f-7bd66eb6739b",
                            ],
                            [
                                "type" => "iop",
                                "id" => "6a30e2a6-7770-471c-8cc7-94e9312a148f",
                            ],
                            [
                                "type" => "tk",
                                "id" => "7ac3286e-a758-45e6-b159-2181490ba800",
                            ],
                        ],
                        "message" => "СБЕРБАНК КАРТОЧКА ГИДРОПРИВОД ИНЖИНИРИНГ",
                    ],
                    "country_codes" => [
                        "ru",
                        "kz",
                    ],
                ],
            ])
        );
        return $producer->sendMessage($message);
    }

    public function testServiceDocumentMessage() {
        $producer = new SpsnKafkaProducer(SpsnAppServiceNames::SPSN_NOTIFY);
        $message = new SpsnKafkaProducerMessage(
            messageType: SpsnNotifyMessageTypes::INVITE_PARTNER,
            message: new SpsnKafkaMessageServiceDocument([
                "workflow_id" => "f0ec960f-effe-4ac6-93cf-0f2741417ada",
                "document_id" => "1516d89b-957b-4ac7-801e-ff0a6fc29c7b",
                "message_id" => "8731d5c7-cfbf-4b56-ac7a-09cf5a4bd371",
                "sender_operator" =>
                [
                    "id" => "tiket_service",
                ],
                "recipient_operator" =>
                [
                    "id" => "833471b4-980d-41f8-b6de-0b7facd52d3d",
                ],
                "sender" =>
                [
                    "id" => "tiket_service",
                ],
                "recipient" =>
                [
                    "id" => "833471b4-980d-41f8-b6de-0b7facd52d3d",
                ],
                "service_message" => [
                    "code" => "100203",
                    "content" => null,
                    "payload" => [
                        [
                            "ticket_id" => "3406ffc4-54e5-4ed1-88df-2f7fddf5ed57",
                            "country_code" => "kz",
                            "result_code" => 0,
                            "result_message" => "you got exactly what you asked for",
                            "created_at" => "2024-10-15T07:05:02.000000Z",
                            "updated_at" => "2024-10-15T07:10:02.000000Z",
                        ],
                        [
                            "ticket_id" => "4064d6af-c02d-490d-9f5c-5d5c99e0d862",
                            "country_code" => "ru",
                            "result_code" => 0,
                            "result_message" => "Идентификатор проверяемых данных: signed_content\nТип подписи: Усиленная, квалифицированная\nИдентификатор службы ДТС: ДТС v.6",
                            "created_at" => "2024-10-15T07:05:02.000000Z",
                            "updated_at" => "2024-10-15T07:10:02.000000Z",
                        ],
                    ],
                ],
            ])
        );
        return $producer->sendMessage($message);
    }
}
