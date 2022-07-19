<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\DTO\UserDataTransferObject;
use App\Model\EntityManager\UserEntityManager;

class AdminAddUserController implements ControllerInterface
{

    public function __construct(private Container $container, private View $view)
    {
        $this->UserEntityManager = $container->get(UserEntityManager::class);
    }

    public function render()
    {

        $this->addUser();
        $this->view->setTemplate("adminAddUserView.tpl");
        $this->redirect("AdminManageUserController");
    }


    public function addUser()
    {
        if (isset($_POST['addUser'])) {
            $password = $_POST['password'];
            $userName = $_POST['userName'];
            $email = $_POST['email'];


            $userDto = new UserDataTransferObject();

            $userDto->setPassword($password);
            $userDto->setEmail($email);
            $userDto->setName($userName);

            $this->UserEntityManager->addProduct($userDto);
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
