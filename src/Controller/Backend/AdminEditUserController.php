<?php
declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\Frontend\ControllerInterface;
use App\Core\Container;
use App\Core\View;

class AdminEditUserController implements ControllerInterface
{

    public function __construct(private Container $container,private View $view)
    {

    }

    public function render()
    {

    }
}