<?php

namespace App\Service;

class Setting {
    protected $config;
    public function __construct(array $config) {
        $this->config = $config;
        return $this->config;
    }

    public function getConfig() {
        return $this->config;
    }
}
