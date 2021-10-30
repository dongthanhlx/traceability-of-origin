<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use DateTime;

class CustomerParams extends Controller
{
    public function __construct(
        public string $code,
        public string $isActive,
        public string $patient,
        public string $phone,
        public string $doctor,
        public string $birthday,
        public string $dentistry,
        public string $lab,
        public string $type,
        public int $numOfTeeth,
        public string $locations
    ) {}
}
