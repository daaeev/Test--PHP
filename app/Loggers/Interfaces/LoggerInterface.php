<?php

namespace App\Loggers\Interfaces;

interface LoggerInterface
{
    /**
     * Создание лога
     *
     * @return void
     */
    public function makeLog(): void;
}