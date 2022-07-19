<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\PdoConnect;
use App\Core\View;
use App\Model\DTO\ProductsDataTransferObject;
use App\Model\DTO\UserDataTransferObject;
use App\Model\EntityManager\UserEntityManager;
use App\Model\Mapper\UserMapper;
use App\Model\Repository\UserRepository;

class AdminEditUserController implements ControllerInterface
{

    public function __construct(private Container $container, private View $view)
    {
        $this->UserEntityManager = $this->container->get(UserEntityManager::class);
    }

    public function render()
    {

        $userRepository = new UserRepository($this->container->get(PdoConnect::class), $this->container->get(UserMapper::class));
        $userDto = $userRepository->findUserById($_GET['id']);
        $this->view->addTemplateParameter('user', $userDto);
        $this->view->setTemplate('adminEditUserControllerView.tpl');
        $this->update($userDto);

    }

    private function update($userDto)
    {

        if (isset($_POST['updateUser'])) {

            $name = $_POST['userName'] ?? '';
            $password = $_POST['password'] ?? '';
            $email = $_POST['email'] ?? '';

            $userDto->setName($name);
            $userDto->setEmail($email);
            $userDto->setPassword($password);

            $this->UserEntityManager->updateData($userDto);
        }
    }


}