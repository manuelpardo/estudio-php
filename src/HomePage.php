<?php

namespace TaskList;

use Zend\Diactoros\Request;
use Zend\Diactoros\Response;
use TaskList\Templating\Templating;
use Espresso\HttpModule\Pipeline\Next;
use Psr\Http\Server\MiddlewareInterface;
use Zend\Diactoros\Response\HtmlResponse;

class HomePage implements MiddlewareInterface
{   
   /**
     * @var Templating
     */
    protected $templating;

    public function __construct(Templating $templating)
    {
        $this->templating = $templating;
    }

   public function process(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Server\RequestHandlerInterface $handler): \Psr\Http\Message\ResponseInterface
   {
    return new HtmlResponse(
        $this->templating->render('auth/index')
    );
   }
}