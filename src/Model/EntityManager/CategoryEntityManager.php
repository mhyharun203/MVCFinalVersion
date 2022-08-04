<?php
declare(strict_types=1);

namespace App\Model\EntityManager;

use App\Core\PdoConnect;
use App\Model\DTO\CategoryDataTransferObject;

class CategoryEntityManager
{

    public function __construct(private PdoConnect $pdoConnect)
    {

    }

    public function addCategory(CategoryDataTransferObject $categoryDto) {

        $name = $categoryDto->getName();


        $pdoConnection = $this->pdoConnect->connectToDatabase();
        $stmt = $pdoConnection->prepare("INSERT INTO category_list (name) VALUES ('$name')");
        $stmt->execute();
    }

}