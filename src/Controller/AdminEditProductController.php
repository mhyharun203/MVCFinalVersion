<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\View;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\ProductRepository;

class AdminEditProductController implements ControllerInterface
{

    private View $view;
    private ProductRepository $productRepository;


    public function __construct(View $view, ProductRepository $productRepository)
    {
        $this->view = $view;
        $this->productRepository = $productRepository;
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
            $productDTO = new ProductsDataTransferObject();
            $productDTO->setProductId((int)$productId);
            $productDTO->setName($name);

            $this->productRepository->updateData($productDTO);

        }
    }

}