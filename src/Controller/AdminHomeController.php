<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\Container;
use App\Core\View;
use App\Model\Repository\ProductRepository;

class AdminHomeController
{

    private ProductRepository $productRepository;

    public function __construct(Container $container , private View $view)
    {
        $this->productRepository = $container->get(ProductRepository::class);

    }


    public function render()
    {

        $a = $this->productRepository->getAllProducts();

        $this->view->addTemplateParameter('product', $a);
        $this->view->setTemplate("adminHomeView.tpl");

    }
}