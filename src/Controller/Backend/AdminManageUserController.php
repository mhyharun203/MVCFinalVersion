<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;
use App\Model\Repository\UserRepository;
use http\Client\Curl\User;


class AdminManageUserController implements ControllerInterface
{

    private UserRepository $userRepository;

    public function __construct(private Container $container, private View $view)
    {
        $this->userRepository = $this->container->get(UserRepository::class);
    }


    public function render()
    {

        $allUser = $this->userRepository->getAllUser();

        $this->view->addTemplateParameter('userList',$allUser);
        $this->view->setTemplate("adminManageUserView.tpl");
    }


}