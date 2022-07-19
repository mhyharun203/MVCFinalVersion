<?php
declare(strict_types=1);

namespace AppTest;

use App\Controller\Frontend\CategoryController;
use App\Core\PdoConnect;
use App\Core\View;
use App\Model\Mapper\ProductsMapper;
use App\Model\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;
use Smarty;

class CategoryControllerTest extends TestCase
{
    public function testRenderCategory1() {
        $mapper = new ProductsMapper();
        $pdoConnect = new PdoConnect();
        $productRepository = new ProductRepository($mapper, $pdoConnect);
        $view = new View(new Smarty());
        $controller = new CategoryController($view, $productRepository);

        $_GET['id'] = '1';
        $controller->render();

        $params = $view->getParams();
        $template = $view->getTemplate();


        self::assertSame('jeans',$params['categoryProducts']['0']->getCategoryName());
        self::assertSame('CategoryView.tpl', $template);

    }



public function testRenderCategory2() {
    $mapper = new ProductsMapper();
    $pdoConnect = new PdoConnect();
    $productRepository = new ProductRepository($mapper ,$pdoConnect);
    $view = new View(new Smarty());
    $controller = new CategoryController($view, $productRepository);
    $_GET['page'] = 'CategoryController';
    $_GET['id'] = '2';
    $controller->render();

    $params = $view->getParams();
    $template = $view->getTemplate();


    self::assertSame('shirts',$params['categoryProducts']['0']->getCategoryName());
    self::assertSame('CategoryView.tpl', $template);

}


    public function testRenderCategory3() {
        $mapper = new ProductsMapper();
        $pdoConnect = new PdoConnect();
        $productRepository = new ProductRepository($mapper,$pdoConnect );
        $view = new View(new Smarty());
        $controller = new CategoryController($view, $productRepository);
        $_GET['page'] = 'CategoryController';
        $_GET['id'] = '3';
        $controller->render();

        $params = $view->getParams();
        $template = $view->getTemplate();


        self::assertSame('socks',$params['categoryProducts']['0']->getCategoryName());
        self::assertSame('CategoryView.tpl', $template);

    }




}