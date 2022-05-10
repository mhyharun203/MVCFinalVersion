<?php

declare(strict_types=1);

namespace App\Core;

final class View implements ViewInterface
{
    private $params = [];
    private $template;

    public function __construct(\Smarty $smarty)
    {
        $this->smarty = $smarty;
    }

    public function addTemplateParameter(string $key, $value): void
    {
        $this->params[$key] =  $value;
    }

    public function display()
    {
        $this->smarty->assign($this->params);
        $this->smarty->display(__DIR__ . '/../../templates/' . $this->template);

    }

    public function getParams()
    {
        return $this->params;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template){
        $this->template = $template;
    }
}