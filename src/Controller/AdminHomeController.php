<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\View;
use App\Model\ProductRepository;

class AdminHomeController
{
    private View $view;
    private ProductRepository $productRepository;

    public function __construct(View $view, ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->view = $view;
    }


    public function render()
    {

        $a = $this->productRepository->getAllProducts();

        $this->view->addTemplateParameter('product', $a);
        $this->view->setTemplate("adminHomeView.tpl");

    }
}