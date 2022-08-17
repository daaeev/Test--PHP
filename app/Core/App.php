<?php

namespace App\Core;

use App\Loggers\CsvLogger;
use App\Loggers\Interfaces\LoggerInterface;
use App\Loggers\TextLogger;
use App\Router\ControllerActionRouter;
use App\Router\Interfaces\RouterInterface;

class App
{
    public function __construct(protected RouterInterface $router)
    { 
    }

    /**
     * Запуск приложения
     *
     * @return void
     */
    public function start()
    {
        $controller = new ($this->router->getController());
        
        $action = $this->router->getAction();

        $controller->$action();
    }

    /**
     * Получить класс для логирования
     *
     * @return LoggerInterface
     */
    public static function getLogger(): LoggerInterface
    {
        return new CsvLogger;
    }

    public static function getRouter(): RouterInterface
    {
        return new ControllerActionRouter($_SERVER);
    }
}
