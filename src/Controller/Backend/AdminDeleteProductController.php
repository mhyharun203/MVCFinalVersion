<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\EntityManager\ProductEntityManager;
use App\Model\Repository\ProductRepository;

class AdminDeleteProductController implements ControllerInterface
{


    public function __construct(Container $container, private View $view)
    {
        $this->productRepository = $container->get(ProductRepository::class);
        $this->ProductEntityManager = $container->get(ProductEntityManager::class);
    }

    public function render()
    {
        $productId = (int)$_GET['id'];
        $this->deleteProduct($productId);
        $this->redirect("AdminHomeController");

    }

    public function deleteProduct($productId)
    {
        if (isset($_POST['deleteProduct'])) {
            $this->ProductEntityManager->deleteProduct($productId);
        }
    }

    public function redirect(string $url): void
    {
        if (isset($_GET['id'])) {
            $header = "Location: http://localhost:2020/index.php?page=" . $url;
            header($header);
            die();
        }
    }
}
