<?php
declare(strict_types=1);
namespace App\Controller\Frontend;


use App\Core\Container;
use App\Core\View;
use App\Model\Repository\UserRepository;

interface ControllerInterface {
public function __construct(Container $container, View $view);
    public function render();
}

