<?php

namespace App\Router\Interfaces;

interface RouterInterface
{
    /**
     * Получить контроллер
     *
     * @return string
     */
    public function getController(): string;

    /**
     * Получить экшен
     *
     * @return string
     */
    public function getAction(): string;
}
