<?php
declare(strict_types=1);

use App\Core\View;
use App\Controller\DetailController;

class  DetailControllerTest extends \PHPUnit\Framework\TestCase

{
    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        unset($_GET);
    }

    public function testRender()
    {

        $view = new View(new Smarty());
        $controller = new DetailController($view);
        $_GET['id'] = '2';
        $controller->render();

        $params = $view->getParams();
        $template = $view->getTemplate();

        self::assertSame('Blue Jeans', $params['product']->getName());
        self::assertSame('20€', $params['product']->getPrice());
        self::assertSame("A very nice Blue jeans with 100 % cotton", $params['product']->getDescription());

        self::assertSame('DetailView.tpl',$template);

    }
}