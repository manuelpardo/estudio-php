<?php

namespace TaskList\Templating;

use Twig\Environment;

class TwigTemplating implements Templating
{
    protected $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;    
    }
    
    public function render(string $templateName, array $context = []): string
    {
        return $this->twig->render($templateName.'.html.twig', $context);
    }
}