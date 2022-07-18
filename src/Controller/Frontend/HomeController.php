<?php
declare(strict_types=1);


namespace App\Controller\Frontend;

use App\Core\Container;
use App\Core\View;


class HomeController implements ControllerInterface
{



    public function __construct(Container $container, private View $view)
    {
        
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


