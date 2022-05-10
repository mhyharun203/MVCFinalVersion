<?php
declare(strict_types=1);


namespace App\Controller;

use App\Core\View;


class HomeController implements ControllerInterface
{
    private View $view;


    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function render()
    {


        $this->view->addTemplateParameter('jeans', 'jeans');
        $this->view->addTemplateParameter('shirts', 'shirts');
        $this->view->addTemplateParameter('socks', 'socks');
        $this->view->addTemplateParameter('AdminArea', 'Admin Area');
        $this->view->setTemplate("HomeView.tpl");


    }
}


