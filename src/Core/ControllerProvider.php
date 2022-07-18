<?php
declare(strict_types=1);

namespace App\Core;

use App\Controller\Backend\AdminDeleteProductController;
use App\Controller\Backend\AdminEditProductController;
use App\Controller\Backend\AdminHomeController;
use App\Controller\Backend\AdminLogInController;
use App\Controller\Backend\AdminManageUserController;
use App\Controller\Frontend\CategoryController;
use App\Controller\Frontend\DetailController;
use App\Controller\Frontend\HomeController;
use App\Controller\Backend\AdminAddProductController;

final class ControllerProvider
{
    public function getList(): array
    {
        return [
            DetailController::class,
            CategoryController::class,
            HomeController::class,
            AdminLogInController::class,
            AdminHomeController::class,
            AdminEditProductController::class,
            AdminDeleteProductController::class,
            AdminAddProductController::class,
            AdminManageUserController::class
        ];
    }
}