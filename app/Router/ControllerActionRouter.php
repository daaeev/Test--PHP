<?php

namespace App\Router;

use App\Router\Interfaces\RouterInterface;
use Exception;

class ControllerActionRouter implements RouterInterface
{
    public function __construct(protected array $server)
    {
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getController(): string
    {
        $uri = $this->server['REQUEST_URI'] ?? throw new Exception('Путь к ресурсу не найден', 500);

        $uri_exploded = explode('/', substr($uri, 1), 2);

        if (count($uri_exploded) !== 2) {
            throw new Exception('Неверный маршрут', 404);
        }

        $controller_class = '\App\Controllers\\' . ucfirst($uri_exploded[0]) . 'Controller';

        if (!class_exists($controller_class)) {
            throw new Exception('Неверный маршрут', 404);
        }

        return $controller_class;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getAction(): string
    {
        $uri = $this->server['REQUEST_URI'] ?? throw new Exception('Путь к ресурсу не найден', 500);

        $uri_exploded = explode('/', substr($uri, 1), 2);

        if (count($uri_exploded) !== 2) {
            throw new Exception('Неверный маршрут', 404);
        }

        $action_name = ucfirst($uri_exploded[1]) . 'Action';

        if (!method_exists($this->getController(), $action_name)) {
            throw new Exception('Неверный маршрут', 404);
        }

        return $action_name;
    }
}