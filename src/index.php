<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';


use App\Controller\DetailController;
use App\Controller\CategoryController;
use App\Controller\HomeController;
use App\Core\ControllerProvider;
use App\Core\PdoConnect;
use App\Core\View;
use App\Model\ProductRepository;
use App\Model\Mapper\ProductsMapper;

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$smarty = new Smarty();

$search = $_GET['page'] ?? 'HomeController';

$provider = new ControllerProvider();


foreach ($provider->getList() as $class) {
    if ('App\Controller\\' . $search === $class) {
        $view = new View($smarty);
        $productRepository = new ProductRepository(new ProductsMapper(), new PdoConnect());
        $page = new $class($view, $productRepository);
        $page->render();
        $view->display();
    }
}


