# Entry script

This repository in index.php contains the entry script for middleware based applications.

## Instalation

    composer require pawel-jakowczyk/entry-script

## Usage

In order to set up application using this script one must set following environmental variables:
- autoloadPath - absolute path to application autoload.php file.
- debug - 0/1 sets debug on or off.
- configPath - absolute path for routing configuration.

Routing configuration file has to return the PJ\Middleware\MiddlewareRouteCollection.
