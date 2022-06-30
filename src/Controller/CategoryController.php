<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\Container;
use App\Core\View;
use App\Model\Repository\ProductRepository;


class CategoryController implements ControllerInterface
{

    private ProductRepository $productRepository;

    public function __construct(Container $container, private View $view)
    {
        $this->productRepository = $container->get(ProductRepository::class);

    }


    public function render()
    {


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


