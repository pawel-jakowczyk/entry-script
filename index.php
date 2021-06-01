<?php
$autoloadPath = getenv('autoloadPath');
$configPath = getenv('configPath');
$debug = getenv('debug');

require_once $autoloadPath;

use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;
use PJ\Routing\RoutingMiddleware;
use PJ\Middleware\MiddlewareFactoryRequestHandler;

$debug ? Debug::enable() : ErrorHandler::register();

$routingMiddleware = RoutingMiddleware::create(require $configPath);
$response = $routingMiddleware->process(
    ServerRequestFactory::fromGlobals(),
    new MiddlewareFactoryRequestHandler(),
);
(new SapiEmitter())->emit($response);
