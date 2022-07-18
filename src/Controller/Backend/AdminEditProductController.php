<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\EntityManager\ProductEntityManager;
use App\Model\Repository\ProductRepository;

class AdminEditProductController implements ControllerInterface
{


    private ProductRepository $productRepository;


    public function __construct(Container $container, private View $view)
    {

        $this->productRepository = $container->get(ProductRepository::class);
        $this->entityManager = $container->get(ProductEntityManager::class);
    }


    public function render()
    {
        $productId = $_GET['id'];
        $product = $this->productRepository->findProductById($productId);


        $this->view->addTemplateParameter('product', $product);
        $this->view->setTemplate("adminEditProductView.tpl");

        $this->update($productId);
    }

    private function update($productId)
    {

        if (isset($_POST['updateProduct'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $productDTO = new ProductsDataTransferObject();
            $productDTO->setProductId((int)$productId);
            $productDTO->setName($name);
            $productDTO->setPrice($price);
            $productDTO->setDescription($description);

            $this->entityManager->updateData($productDTO);
        }
    }


}