<?php
declare(strict_types=1);

namespace App\Core;

use App\Controller\AdminEditProductController;
use App\Controller\AdminHomeController;
use App\Controller\AdminLogInController;
use App\Controller\DetailController;
use App\Controller\CategoryController;
use App\Controller\HomeController;

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
            AdminEditProductController::class
        ];
    }
}