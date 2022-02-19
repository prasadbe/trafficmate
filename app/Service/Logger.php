<?php

namespace App\Service;

interface Logger {
    public function __construct(Setting $config);
    public function log($text);
}
