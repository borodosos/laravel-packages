<?php

namespace App\Listeners;

use Spsn\Kafka\Events\SpsnKafkaMessageReceived;

class KafkaListener {
    /**
     * Create the event listener.
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SpsnKafkaMessageReceived $event): void {
    }
}
