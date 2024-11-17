<?php

use Spsn\Kafka\Providers\SpsnKafkaProvider;

return [
    App\Providers\AppServiceProvider::class,
    SpsnKafkaProvider::class,
];