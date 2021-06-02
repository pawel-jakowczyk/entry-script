<?php
$autoloadPath = getenv('autoloadPath');
$configPath = getenv('configPath');
$debug = getenv('debug');

require_once $autoloadPath;

use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use PJ\Routing\RoutingMiddleware;
use PJ\Middleware\MiddlewareFactoryRequestHandler;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\ErrorHandler;

$debug ? Debug::enable() : ErrorHandler::register();

(new SapiEmitter())->emit(
    RoutingMiddleware::create(require $configPath)->process(
        ServerRequestFactory::fromGlobals(),
        new MiddlewareFactoryRequestHandler(),
    )
);
