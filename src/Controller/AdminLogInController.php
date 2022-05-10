<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\ControllerInterface;
use App\Core\View;

class AdminLogInController implements ControllerInterface
{
    private View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
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
        $email = $_POST['email'];
        $testPasswort = 'Harun';
        $password = $_POST['password'];
        if ($testPasswort === $password) {
            $_SESSION['LoggedIn'] = $email;
            header("Location: " . 'index.php?page=AdminHomeController');
        }
    }
}
