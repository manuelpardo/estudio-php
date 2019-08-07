<?php

use Twig\Environment;
use League\Container\Container;
use Twig\Loader\LoaderInterface;
use Twig\Loader\FilesystemLoader;
use TaskList\Templating\Templating;
use Psr\Container\ContainerInterface;
use TaskList\Http\BasicAuthenticator;
use TaskList\Templating\TwigTemplating;
use Doctrine\ORM\EntityManagerInterface;
use League\Container\ReflectionContainer;
use Symfony\Component\Dotenv\Dotenv;
use TaskList\Repository\UserRepository;
use TaskList\Entity\User;

$env = new Dotenv();
try {
    $env->load(__DIR__.'/../.env');
} catch (\Exception $exception) {

}

/**
 * @return ContainerInterface
 */
$createContainer = static function() {
    $container = new Container();
    $container->delegate((new ReflectionContainer())->cacheResolutions());

    $container->share(BasicAuthenticator::class)
        ->addArgument('bWF0aWFzOjEyMzQ=');

    /**
     * SERVICIOS DE TEMPLATING
     * Estos servicios nos permiten trabajar con plantillas.
     */
    $container->share(Templating::class, TwigTemplating::class)
        ->addArgument(Environment::class);
    $container->share(Environment::class)
        ->addArgument(LoaderInterface::class);
    $container->share(LoaderInterface::class, FilesystemLoader::class)
        ->addArgument([__DIR__.'/../views']);

    return $container;
};
