<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\EntityManager\EntityManager;
use App\Model\Repository\ProductRepository;

class AdminAddProductController implements ControllerInterface

{


    public function __construct(Container $container, private View $view)
    {
        $this->productRepository = $container->get(ProductRepository::class);
        $this->entityManager = $container->get(EntityManager::class);
    }

    public function render()
    {
        $baum = 'Add Product';
        $this->view->addTemplateParameter('baum', $baum);
        $this->view->setTemplate("adminAddProductView.tpl");
        $this->addProduct();
    }


    public function addProduct()
    {
        if (isset($_POST['addProduct'])) {
           $productName = $_POST['productName'];
           $categoryName = $_POST['categoryName'];
           $categoryId = $_POST['categoryId'];
           $productPrice= $_POST['productPrice'];
           $productDescription = $_POST['productDescription'];
           $productId = $_POST['productId'];
           $productDTO = new ProductsDataTransferObject();
           $productDTO->setName($productName);
           $productDTO->setCategoryName($categoryName);
           $productDTO->setCategoryId((int)$categoryId);
           $productDTO->setPrice($productPrice);
           $productDTO->setDescription($productDescription);
           $productDTO->setProductId((int)$productId);
           $this->entityManager->addProduct($productDTO);
        }
    }
}