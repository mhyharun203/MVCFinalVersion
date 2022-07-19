<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\EntityManager\UserEntityManager;

class AdminDeleteUserController implements ControllerInterface
{

    public function __construct(private Container $container,private View $view)
    {
        $this->UserEntityManager = $container->get(UserEntityManager::class);
    }

    public function render()
    {
        $user = $_GET['id'];
        $this->deleteUser((int)$user);
        $this->view->setTemplate("adminDeleteUserView.tpl");
        $this->redirect("AdminManageUserController");
    }

    public function deleteUser($id)
    {
        if (isset($_POST['deleteProduct'])) {
            $this->UserEntityManager->deleteUser($id);
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