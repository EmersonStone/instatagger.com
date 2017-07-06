<?php

// bootstrap/testingAutoload.php

passthru("php artisan migrate:refresh --env=testing");
require __DIR__ . '/autoload.php';
