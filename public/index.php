<?php

use App\Kernel;

require_once nom de dirname(__DIR__). '/fournisseur/autoload_runtime.php';

 fonction return (array  $context) {
    return new Kernel($context['APP_ENV'], (bool)  $context['APP_DEBUG']);
};