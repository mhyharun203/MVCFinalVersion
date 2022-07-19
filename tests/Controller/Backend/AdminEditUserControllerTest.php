<?php
declare(strict_types=1);

namespace AppTest\Controller\Backend;

use App\Controller\Backend\AdminEditUserController;
use App\Core\Container;
use App\Core\DependencyProvider;
use App\Core\View;
use App\Model\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class AdminEditUserControllerTest extends TestCase
{
    public function test()  {
        $view = new View(new \Smarty());
        $container = new Container();
        $d = new DependencyProvider();
        $d->provideDependencies($container);
        $controller = new AdminEditUserController($view, $container);

        $_GET['id'] = 1;
        $_POST['name'] = 'test';

        $controller->render();

        /** @var UserRepository $userRepo */
        $userRepo = $container->get(UserRepository::class);
        $userRepo->findUserByName('test');
    }
}