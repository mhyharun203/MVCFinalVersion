<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\PdoConnect;
use App\Core\View;
use App\Model\Mapper\ProductsMapper;
use App\Model\ProductRepository;

class DetailController implements ControllerInterface
{

    private View $view;


    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function redirect()
    {
        if (!isset($_GET['id'])) {
            $header = "Location: http://localhost:2020/index.php";
            header($header);
            return $header;

        }
    }

    public function render()
    {
        $this->redirect();


        $productId = $_GET['id'];
        $productModel = new ProductRepository(new ProductsMapper(), new PdoConnect());
        $product = $productModel->findProductById($productId); //guckt sich Alle Daten an, und sucht nach den Daten mit der  aktuellen id :)


        $this->view->addTemplateParameter('product', $product);
        $this->view->setTemplate("DetailView.tpl");

    }

}