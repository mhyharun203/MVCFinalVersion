<?php
declare(strict_types=1);

use App\Controller\Frontend\HomeController;
use App\Core\View;

class  HomeControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testRender()
    {

        $view = new View(new Smarty());
        $controller = new HomeController($view);

        $controller->render();

        $params = $view->getParams();
        $template = $view->getTemplate();
        self::assertSame('jeans', $params['jeans']);
        self::assertSame('shirts', $params['shirts']);
        self::assertSame('socks', $params['socks']);
        self::assertSame('HomeView.tpl', $template);


    }
}