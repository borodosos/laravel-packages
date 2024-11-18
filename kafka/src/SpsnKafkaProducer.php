<?php

namespace Spsn\Kafka;

use Junges\Kafka\Facades\Kafka;
use Spsn\Kafka\Messages\SpsnKafkaProducerMessage;

class SpsnKafkaProducer {
    private $producer;

    public function __construct(string $appServiceName) {
        $topic = config('spsn_kafka.topics')[$appServiceName];
        $this->producer = Kafka::publish(config('kafka.brokers'))
            ->withConfigOptions(config('spsn_kafka.producer.options'))
            ->onTopic($topic);
    }

    public function sendMessage(SpsnKafkaProducerMessage $message) {
        return 123;
        // SpsnKafkaProducerJob::dispatchAfterResponse($message, $this->producer);
    }

    public function aa() {
        return 123;
    }
}