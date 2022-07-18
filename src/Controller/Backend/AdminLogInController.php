<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\Repository\UserRepository;


class AdminLogInController implements ControllerInterface
{

    private UserRepository $userRepository;

    public function __construct(private Container $container, private View $view)
    {
        $this->userRepository = $container->get(UserRepository::class);
    }


    public function render()
    {
        $this->view->setTemplate("adminLogInView.tpl");
        $this->login();
    }

    private function login(): void
    {
        if (!isset($_POST['logIn'])) {
            return;
        }

        $info = $this->userRepository->findUserByName($_POST['userName']);

        $userNameFromTable = $info->getName();
        $userPasswordFromTable = $info->getPassword();
        $userNameFromPost = $_POST['userName'];
        $passwordFromPost = $_POST['password'];

        if ($userNameFromPost === $userNameFromTable && $passwordFromPost === $userPasswordFromTable) {
            $_SESSION['LoggedIn'] = $userNameFromTable;
            header("Location: " . 'index.php?page=AdminHomeController');
        }else {
        }
    }
}
