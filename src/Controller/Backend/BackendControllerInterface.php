<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Core\Container;
use App\Core\View;
use App\Model\Repository\UserRepository;

interface BackendControllerInterface {
    public function __construct(Container $container, View $view, UserRepository $userRepository);
    public function render();
}
