<?php

utiliser App\Kernel;
utiliser Symfony\Component\Dotenv\Dotenv;
utiliser Symfony\Component\ErrorHandler\Debug;
utiliser Symfony\Component\HttpFoundation\Request;

nécessitent dirname(__DIR__). '/vendor/autoload.php';

(new Dotenv())->bootEnv(dirname(__DIR__).' /.env');

si (_SERVER$['APP_DEBUG']) {
    umask(0000);

    Déboguer::activer();
}

 $kernel = nouveau noyau($_SERVER['APP_ENV'], (bool)  $_SERVER['APP_DEBUG']);
 $request = Demande::createFromGlobals();
 $réponse =  $kernel->handle($request);
 $réponse->envoyer();
 $kernel->terminate($request,  $response);