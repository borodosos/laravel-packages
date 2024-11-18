<?php

namespace Spsn\Kafka\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SpsnKafkaProducerJob implements ShouldQueue {
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     */
    public function handle($message, $producer): void {
        Log::debug("Starting");
        // $producer->withMessage($message)->send();
    }
}