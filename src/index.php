<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';


use App\Core\Container;
use App\Core\ControllerProvider;
use App\Core\PdoConnect;
use App\Core\View;
use App\Model\Mapper\ProductsMapper;
use App\Model\Repository\ProductRepository;
use App\Model\EntityManager\EntityManager;


$container = new Container();
$dependencyProvider = new \App\Core\DependencyProvider();
$dependencyProvider->provideDependencies($container);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$smarty = new Smarty();

$search = $_GET['page'] ?? 'HomeController';

$provider = new ControllerProvider();


foreach ($provider->getList() as $class) {
    if ('App\Controller\\' . $search === $class) {
        $view = new View(new Smarty());

        $page = new $class($container, $view);
        $page->render();
        $view->display();
    }
}


