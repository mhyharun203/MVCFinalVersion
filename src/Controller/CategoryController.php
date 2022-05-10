<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\View;
use App\Model\ProductRepository;


class CategoryController implements ControllerInterface
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

        $category = '1';
        if ($_GET['id'] === '1') {
            $category = 1;
        } elseif ($_GET['id'] === '2') {
            $category = 2;
        } else {
            $category = 3;
        }


        $productDtoList = $this->productRepository->findCategoryById($category);

        $this->view->addTemplateParameter('categoryProducts', $productDtoList);
        $this->view->setTemplate("CategoryView.tpl");

    }
}


