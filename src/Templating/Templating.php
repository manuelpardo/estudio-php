<?php

namespace TaskList\Templating;


interface Templating
{
    /**
     * Undocumented function
     *
     * @param string $templateName
     * @param array $context
     * @return string
     */
    public function render(string $templateName, array $context = []): string;
}